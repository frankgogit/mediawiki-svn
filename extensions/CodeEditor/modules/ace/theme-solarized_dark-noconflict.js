ace.define("ace/theme/solarized_dark",["require","exports","module"],function(a,b,c){b.isDark=!0,b.cssClass="ace-solarized-dark",b.cssText=".ace-solarized-dark .ace_editor {  border: 2px solid rgb(159, 159, 159);}.ace-solarized-dark .ace_editor.ace_focus {  border: 2px solid #327fbd;}.ace-solarized-dark .ace_gutter {  background: #e8e8e8;  color: #333;}.ace-solarized-dark .ace_print_margin {  width: 1px;  background: #e8e8e8;}.ace-solarized-dark .ace_scroller {  background-color: #002B36;}.ace-solarized-dark .ace_text-layer {  cursor: text;  color: #93A1A1;}.ace-solarized-dark .ace_cursor {  border-left: 2px solid #D30102;}.ace-solarized-dark .ace_cursor.ace_overwrite {  border-left: 0px;  border-bottom: 1px solid #D30102;} .ace-solarized-dark .ace_marker-layer .ace_selection {  background: #073642;}.ace-solarized-dark .ace_marker-layer .ace_step {  background: rgb(198, 219, 174);}.ace-solarized-dark .ace_marker-layer .ace_bracket {  margin: -1px 0 0 -1px;  border: 1px solid rgba(147, 161, 161, 0.50);}.ace-solarized-dark .ace_marker-layer .ace_active_line {  background: #073642;}.ace-solarized-dark .ace_marker-layer .ace_selected_word {  border: 1px solid #073642;}       .ace-solarized-dark .ace_invisible {  color: rgba(147, 161, 161, 0.50);}.ace-solarized-dark .ace_keyword {  color:#859900;}.ace-solarized-dark .ace_constant.ace_language {  color:#B58900;}.ace-solarized-dark .ace_constant.ace_numeric {  color:#D33682;}.ace-solarized-dark .ace_fold {    background-color: #268BD2;    border-color: #93A1A1;}.ace-solarized-dark .ace_support.ace_function {  color:#268BD2;}.ace-solarized-dark .ace_string {  color:#2AA198;}.ace-solarized-dark .ace_string.ace_regexp {  color:#D30102;}.ace-solarized-dark .ace_comment {  font-style:italic;color:#657B83;}.ace-solarized-dark .ace_variable.ace_language {  color:#268BD2;}.ace-solarized-dark .ace_entity.ace_other.ace_attribute-name {  color:#93A1A1;}.ace-solarized-dark .ace_entity.ace_name.ace_function {  color:#268BD2;}.ace-solarized-dark .ace_markup.ace_underline {    text-decoration:underline;}";var d=a("../lib/dom");d.importCssString(b.cssText,b.cssClass)}),function(){ace.require(["ace/ace"],function(a){window.ace||(window.ace={});for(var b in a)a.hasOwnProperty(b)&&(ace[b]=a[b])})}()