--
-- Kill the old iwl_prefix_from_title index, which may be present on some
-- installs if they ran update.php between it being added and being renamed
--

DROP INDEX iwl_prefix_from_title;

