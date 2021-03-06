/*
 Poor man's XML exporter. :)

 Author: Domas Mituzas ( http://dammit.lt/ )

 License: public domain (as if there's something to protect ;-)

 $Id$

*/
#include <sys/types.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <netinet/in.h>
#include <db.h>
#include "collector.h"

DB *db;

void dumpData(FILE *fd) {
	DBT key,data;
	DBC *c;
	
	char *p, oldhost[128]="",olddb[128]="",*pp;
	int indb=0,inhost=0;
	int i, points;

	struct pfstats *entry;

	bzero(&key,sizeof(key));
	bzero(&data,sizeof(data));
	
	if (db==NULL) {
		db_create(&db,NULL,0);
		db->open(db,NULL,"stats.db",NULL,DB_BTREE,0,0);
	}
	db->cursor(db,NULL,&c,0);
	fprintf(fd,"<pfdump>\n");
	while(c->c_get(c, &key, &data, DB_NEXT )==0) {
		entry=data.data;
		p=key.data;
		/* Get DB */	
		pp=strsep(&p,":");
		if (strcmp(pp,olddb)) {
			if (indb) {
				fprintf(fd,"</host></db>");
				inhost=0;
                                strcpy(oldhost,"");
			}
			fprintf(fd,"<db name=\"%s\">\n",pp);
			strcpy(olddb,pp);
			indb++;
		}
		/* Get Host/Context */
		pp=strsep(&p,":");
		if (strcmp(pp,oldhost)) {
			if (inhost)
				fprintf(fd,"</host>\n");
			fprintf(fd,"<host name=\"%s\">\n",pp);
			strcpy(oldhost,pp);
			inhost++;
		}
		/* Get EVENT */
		fprintf(fd,"<event>\n" \
				"<eventname><![CDATA[%.*s]]></eventname>\n" \
				"<stats count=\"%lu\">\n" \
				"<cputime total=\"%lf\" totalsq=\"%lf\" />\n" \
				"<realtime total=\"%lf\" totalsq=\"%lf\" />\n" \
				"<samples real=\"",
				(int)(key.size - ((void *)p-(void *)key.data)),p,
				entry->pf_count, entry->pf_cpu, entry->pf_cpu_sq,
				entry->pf_real, entry->pf_real_sq);
		if (entry->pf_count >= POINTS) { 
			points = POINTS;
		} else { 
			points = entry->pf_count;
		}
		for (i=0; i<points-1; i++) { 
			fprintf(fd,"%lf ", entry->pf_reals[i]);
		}
		fprintf(fd,"%lf", entry->pf_reals[points-1]);
		fprintf(fd,"\" />\n" \
				"</stats></event>\n");
	}
	fprintf(fd,"</host>\n</db>\n</pfdump>\n");
	c->c_close(c);
}

