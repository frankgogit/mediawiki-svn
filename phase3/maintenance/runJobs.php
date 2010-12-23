<?php
/**
 * This script starts pending jobs.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @ingroup Maintenance
 */

require_once( dirname( __FILE__ ) . '/Maintenance.php' );

class RunJobs extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = "Run pending jobs";
		$this->addOption( 'maxjobs', 'Maximum number of jobs to run', false, true );
		$this->addOption( 'type', 'Type of job to run', false, true );
		$this->addOption( 'procs', 'Number of processes to use', false, true );
		$this->addOption( 'exclusive', 'Run only one exclusive runJobs script at a time. Timeout is 1800 seconds. Useful for cron scripts.', false );
	}

	public function memoryLimit() {
		// Don't eat all memory on the machine if we get a bad job.
		return "150M";
	}

	public function execute() {
		if ( $this->lock() === false ) {
			exit( 0 );
		}

		global $wgTitle;
		if ( $this->hasOption( 'procs' ) ) {
			$procs = intval( $this->getOption( 'procs' ) );
			if ( $procs < 1 || $procs > 1000 ) {
				$this->error( "Invalid argument to --procs", true );
			}
			$fc = new ForkController( $procs );
			if ( $fc->start( $procs ) != 'child' ) {
				$this->unlock();
				exit( 0 );
			}
		}
		$maxJobs = $this->getOption( 'maxjobs', 10000 );
		$type = $this->getOption( 'type', false );
		$wgTitle = Title::newFromText( 'RunJobs.php' );
		$dbw = wfGetDB( DB_MASTER );
		$n = 0;
		$conds = '';
		if ( $type !== false )
			$conds = "job_cmd = " . $dbw->addQuotes( $type );

		while ( $dbw->selectField( 'job', 'job_id', $conds, 'runJobs.php' ) ) {
			$offset = 0;
			for ( ; ; ) {
				$job = !$type ? Job::pop( $offset ) : Job::pop_type( $type );

				if ( !$job )
					break;

				wfWaitForSlaves( 5 );
				$t = microtime( true );
				$offset = $job->id;
				$status = $job->run();
				$t = microtime( true ) - $t;
				$timeMs = intval( $t * 1000 );
				if ( !$status ) {
					$this->runJobsLog( $job->toString() . " t=$timeMs error={$job->error}" );
				} else {
					$this->runJobsLog( $job->toString() . " t=$timeMs good" );
				}
				if ( $maxJobs && ++$n > $maxJobs ) {
					break 2;
				}
			}
		}
		if ( !$this->hasOption( 'procs' ) ) {
			$this->unlock();
		}
	}

	/**
	 * Log the job message
	 * @param $msg String The message to log
	 */
	private function runJobsLog( $msg ) {
		$this->output( wfTimestamp( TS_DB ) . " $msg\n" );
		wfDebugLog( 'runJobs', $msg );
	}

	protected function lock() {
		if ( $this->hasOption( 'exclusive' ) ) {
			$cache = wfGetCache( CACHE_ANYTHING );
			$running = $cache->get( wfMemcKey( 'runjobs' ) );
			if ( $running ) {
				return false;
			} else {
				$cache->set( wfMemcKey( 'runjobs' ), '1', 1800 );
				return true;
			}
		}
		return true;
	}

	protected function unlock() {
		wfGetCache( CACHE_ANYTHING )->delete( wfMemcKey( 'runjobs' ) );
	}

}

$maintClass = "RunJobs";
require_once( DO_MAINTENANCE );
