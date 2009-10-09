--
-- Schema for ClickTracking
--

CREATE TABLE IF NOT EXISTS /*_*/click_tracking (
	-- Timestamp
	action_time char(14) NOT NULL,

	-- session id
	session_id varbinary(255) NOT NULL,

	-- true if the user is logged in
	is_logged_in tinyint NOT NULL,

	-- total user contributions
	user_total_contribs integer,

	-- user contributions over a specified timespan of granularity 1
	user_contribs_span1 integer,
	
	-- user contributions over a specified timespan of granularity 2
	user_contribs_span2 integer,
	
	-- user contributions over a specified timespan of granularity 3
	user_contribs_span3 integer,

	-- namespace being edited
	namespace integer NOT NULL,

	-- event ID (not unique)
	event_id integer NOT NULL
) /*$wgDBTableOptions*/;