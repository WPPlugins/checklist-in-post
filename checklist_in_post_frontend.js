jQuery(document).ready(function($){  //Edit .todo-list ul appearance
	$('.checklist_in_post > ul').wrap("<form class='todo-list'>");

  $id = 1;
	$('.checklist_in_post > form.todo-list > ul > li').each(function() {
		$text = $(this).html() ;
    $(this).html(' ');
    $(this).prepend("<span class='todo-wrap'><input type=checkbox id='"+ $id +"' /><label for='"+ $id +"' class='todo'><i class='fa fa-check'></i>"+ $text +"</label></span>");
		$id = $id+1;
  });
});
