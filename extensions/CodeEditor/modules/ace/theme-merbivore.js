define("ace/theme/merbivore",["require","exports","module"],function(a,b,c){b.isDark=!0,b.cssClass="ace-merbivore",b.cssText=".ace-merbivore .ace_editor {  border: 2px solid rgb(159, 159, 159);}.ace-merbivore .ace_editor.ace_focus {  border: 2px solid #327fbd;}.ace-merbivore .ace_gutter {  background: #e8e8e8;  color: #333;}.ace-merbivore .ace_print_margin {  width: 1px;  background: #e8e8e8;}.ace-merbivore .ace_scroller {  background-color: #161616;}.ace-merbivore .ace_text-layer {  cursor: text;  color: #E6E1DC;}.ace-merbivore .ace_cursor {  border-left: 2px solid #FFFFFF;}.ace-merbivore .ace_cursor.ace_overwrite {  border-left: 0px;  border-bottom: 1px solid #FFFFFF;} .ace-merbivore .ace_marker-layer .ace_selection {  background: #454545;}.ace-merbivore .ace_marker-layer .ace_step {  background: rgb(198, 219, 174);}.ace-merbivore .ace_marker-layer .ace_bracket {  margin: -1px 0 0 -1px;  border: 1px solid #404040;}.ace-merbivore .ace_marker-layer .ace_active_line {  background: #333435;}.ace-merbivore .ace_marker-layer .ace_selected_word {  border: 1px solid #454545;}       .ace-merbivore .ace_invisible {  color: #404040;}.ace-merbivore .ace_keyword {  color:#FC6F09;}.ace-merbivore .ace_constant {  color:#1EDAFB;}.ace-merbivore .ace_constant.ace_language {  color:#FDC251;}.ace-merbivore .ace_constant.ace_library {  color:#8DFF0A;}.ace-merbivore .ace_constant.ace_numeric {  color:#58C554;}.ace-merbivore .ace_invalid {  color:#FFFFFF;background-color:#990000;}.ace-merbivore .ace_fold {    background-color: #FC6F09;    border-color: #E6E1DC;}.ace-merbivore .ace_support.ace_function {  color:#FC6F09;}.ace-merbivore .ace_string {  color:#8DFF0A;}.ace-merbivore .ace_comment {  font-style:italic;color:#AD2EA4;}.ace-merbivore .ace_meta.ace_tag {  color:#FC6F09;}.ace-merbivore .ace_entity.ace_other.ace_attribute-name {  color:#FFFF89;}.ace-merbivore .ace_markup.ace_underline {    text-decoration:underline;}";var d=a("../lib/dom");d.importCssString(b.cssText,b.cssClass)}),function(){window.require(["ace/ace"],function(a){window.ace||(window.ace={});for(var b in a)a.hasOwnProperty(b)&&(ace[b]=a[b])})}()