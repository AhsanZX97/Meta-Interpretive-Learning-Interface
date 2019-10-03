$( document ).ready(function() {
   
   // Error checking is turned off for the "delete" buttons when we programmatically fill in examples
   window.errorChecking = "On";
   
    // Function to fill in run name, after loading saved run
	function setRunname(runname) {
		window.errorChecking = "Off";
		$("input[name='runname']").val(runname).change();  
		window.errorChecking = "On";
	}
   
   // Used to fill in Predicates
	function setPredicates(predicates, numArgs) {
		window.errorChecking = "Off";
      
		var index = $("#predicates tbody tr").length;
		while(index < predicates.length) {
			$( "#addpred" ).click();
			index = $("#predicates tbody tr").length;
		}
      
		while(index > predicates.length) {
			$("#pred_del_1").click();
			index = $("#predicates tbody tr").length;
		}
      
		for(var i=0;i<predicates.length;i++) {
			$("input[name='pred_"+(i+1)+"']").val(predicates[i]).change();
			$("select[name='pred_num_"+(i+1)+"']").val(numArgs[i]).change();
		}

		window.errorChecking = "On";
	}
   
   // Used to fill in the Arguments
   function setArguments(arguments) {
      window.errorChecking = "Off";
      
      var index = $("#arguments tbody tr").length;
      while(index < arguments.length) {
          $( "#addarg" ).click();
         index = $("#arguments tbody tr").length;
      }
      
      while(index > arguments.length) {
         $("#arg_del_1").click();
         index = $("#arguments tbody tr").length;
      }
      
      for(var i=0;i<arguments.length;i++) {
         $("input[name='arg_"+(i+1)+"']").val(arguments[i]).change();
      }
      
      window.errorChecking = "On";
   }
   
   // Used to fill in the Background Knowledge
   function setBackgroundKnowledge(facts) {
      var index = $("#bk tbody tr").length;
      while(index < facts.length) {
         $( "#addbk" ).click();
         index = $("#bk tbody tr").length;
      }
      
      while(index > facts.length) {
         $("#bk_del_1").click();
         index = $("#bk tbody tr").length;
      }
      
      for(var i=0;i<facts.length;i++) {
         $("select[name='bk_pred_"+(i+1)+"']").val(facts[i][0]);
         for(var j=1;j<facts[i].length;j++) {
            $("select[name='bk_arg"+j+"_"+(i+1)+"']").val(facts[i][j]);
         }
      }
   }
   
   // Used to fill in the Metarules
   function setMetarules(metarules) {
      var index = $("#meta tbody tr").length;
      while(index < metarules.length) {
          $( "#addmeta" ).click();
         index = $("#meta tbody tr").length;
      }
      
      while(index > metarules.length) {
         $("#meta_del_1").click();
         index = $("#meta tbody tr").length;
      }
      
      for(var i=0;i<metarules.length;i++) {
         $("select[name='meta_"+(i+1)+"']").val(metarules[i]);
      }
   }
   
   // Used to clear the Predicates to learn
   function clearEpisodes() {
      var index = $("#episode_divs .ep").length;
      while(index > 0)
      {
		console.log(index);
         $("#episode_del_1").click();
         index = $("#episode_divs .ep").length;
      }
   }

   // Used to clear the Predicates to learn
   function clearCytoScape() {
      cy.elements().remove();
      console.log("cy cleared");
   }
   
   // Used to add a Predicate to learn
   function addEpisode(predicate,pos,neg) {
      $("#addepisode").click();
      
      var episodeNumber = $("#episode_divs .ep").length;
      
      // set predicate
      $("input[name='predicate_"+episodeNumber+"']").val(predicate);
      
      //update POS
      var index = $("#pos_"+episodeNumber+" tbody tr").length;
      while(index < pos.length)
      {
          $( "#addpos_"+episodeNumber ).click();
         index = $("#pos_"+episodeNumber+" tbody tr").length;
      }
      
      while(index > pos.length)
      {
         $("#pos_"+episodeNumber+"_del_1").click();
         index = $("#pos_"+episodeNumber+" tbody tr").length;
      }
      
      for(var i=0;i<pos.length;i++)
      {
         $("select[name='pos_"+episodeNumber+"_pred_"+(i+1)+"']").val(predicate);
         $("select[name='pos_"+episodeNumber+"_arg1_"+(i+1)+"']").val(pos[i][1]);
         $("select[name='pos_"+episodeNumber+"_arg2_"+(i+1)+"']").val(pos[i][2]);
      }
      
      //update NEG
      var index = $("#neg_"+episodeNumber+" tbody tr").length;
      while(index < neg.length)
      {
          $( "#addneg_"+episodeNumber ).click();
         index = $("#neg_"+episodeNumber+" tbody tr").length;
      }
      
      while(index > neg.length)
      {
         $("#neg_"+episodeNumber+"_del_1").click();
         index = $("#neg_"+episodeNumber+" tbody tr").length;
      }
      
      for(var i=0;i<neg.length;i++)
      {
         $("select[name='neg_"+episodeNumber+"_pred_"+(i+1)+"']").val(predicate);
         $("select[name='neg_"+episodeNumber+"_arg1_"+(i+1)+"']").val(neg[i][1]);
         $("select[name='neg_"+episodeNumber+"_arg2_"+(i+1)+"']").val(neg[i][2]);
      }
   }
      
   // fill in all the fields for the given example when clicked
   $( "#grandparent" ).click(function() {
      
      //Show all elements that user may have toggled to hide
      $('table').show();
      $('#episode_divs').show();

      //update BK predicates
      setPredicates(["mother", "father"], [2, 2]);
	  
      //update BK arguments
      setArguments(["ann","amy","andy","amelia","linda","gavin","steve","spongebob"]);
	  
      //update BK
      setBackgroundKnowledge([["mother","ann","amy"],["mother","ann","andy"],["mother","amy","amelia"],["mother","linda","gavin"],["father","steve","amy"],["father","steve","andy"],["father","gavin","amelia"],["father","andy","spongebob"]]);
	  
      //update metarules
      setMetarules(["Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))","Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))"]);
	  
      //update EPISODES
      clearEpisodes();
      
      addEpisode("grandparent",[["grandparent","ann","amelia"],["grandparent","steve","amelia"],["grandparent","ann","spongebob"],["grandparent","steve","spongebob"],["grandparent","linda","amelia"]],[["grandparent","amy","amelia"]]);
	  
      // clear error messages
      $(".err").remove();
      update();
      clearCytoScape();
   });
      
   // fill in all the fields for the given example when clicked
   $( "#ancestor" ).click(function() {
      
      //Show all elements that user may have toggled to hide
      $('table').show();
      $('#episode_divs').show();

      //update BK predicates
      setPredicates(["parent"], [2]);
      
      //update BK arguments
      setArguments(["queen_victoria","edward_seventh","george_fifth","george_sixth","elizabeth_second","queen_mother","prince_charles","prince_philip","prince_william","prince_harry","princess_diana","prince_george"]);
      
      //update BK
      setBackgroundKnowledge([["parent","queen_victoria","edward_seventh"],["parent","edward_seventh","george_fifth"],["parent","george_fifth","george_sixth"],["parent","george_sixth","elizabeth_second"],["parent","queen_mother","elizabeth_second"],["parent","elizabeth_second","prince_charles"],["parent","prince_philip","prince_charles"],["parent","prince_charles","prince_william"],["parent","prince_charles","prince_harry"],["parent","princess_diana","prince_william"],["parent","princess_diana","prince_harry"],["parent","prince_william","prince_george"]]);
      
      //update metarules
      setMetarules(["Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))","Tailrec: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[P,C,B]]))"]);
      
      //update EPISODES
      clearEpisodes();
      
      addEpisode("ancestor",[["ancestor","elizabeth_second","prince_charles"],["ancestor","george_sixth","prince_harry"],["ancestor","queen_mother","prince_william"]],[]);
      
      // clear error messages
      $(".err").remove();
      update();
      clearCytoScape();
   });
   
   // fill in all the fields for the given example when clicked
   $( "#greatgrandparent" ).click(function() {

      //Show all elements that user may have toggled to hide
      $('table').show();
      $('#episode_divs').show();

      //update BK predicates
      setPredicates(["mother", "father"], [2, 2]);
	  
      //update BK arguments
      setArguments(["ann","amy","andy","amelia","linda","gavin","steve","spongebob","sally"]);
	  
      //update BK
      setBackgroundKnowledge([["mother","ann","amy"],["mother","ann","andy"],["mother","amy","amelia"],["mother","linda","gavin"],["father","steve","amy"],["father","steve","andy"],["father","gavin","amelia"],["father","andy","spongebob"],["father","spongebob","sally"]]);
	  
      //update metarules
      setMetarules(["Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))","Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))"]);
	  
      //update EPISODES
      clearEpisodes();
	  
      addEpisode("parent",[["parent","ann","andy"],["parent","steve","andy"],["parent","ann","amy"],["parent","ann","andy"]],[]);
	  
      addEpisode("grandparent",[["grandparent","steve","amelia"],["grandparent","ann","amelia"],["grandparent","linda","amelia"],["grandparent","ann","spongebob"]],[]);
	  
      addEpisode("great_grandparent",[["great_grandparent","ann","sally"],["great_grandparent","steve","sally"]],[]);
	  	  
      // clear error messages
      $(".err").remove();
      update();
      clearCytoScape();
   });
   
   var runid = 36;

   // positive and negative example fields always use the target predicate.
   // adjust these automatically as the user changes the predicate name.
   $('body').on('keyup', "input[id^='pred_']", function() {
      var num = $(this).attr("id").substring(5);
      $( "input[name^='pos_"+num+"_pred_']" ).each(function( index ) {
         $(this).val($("input[name='predicate_"+num+"']").val());
      });
      $( "input[name^='neg_"+num+"_pred_']" ).each(function( index ) {
         $(this).val($("input[name='predicate_"+num+"']").val());
      });
      update();
   });
   
   // delete function for positive and negative examples
   $('body').on('click', 'a.del', function() {
      var ind = $(this).attr("id").indexOf("_");
      var prefix = $(this).attr("id").substring(0,ind);
      var ind2 = $(this).attr("id").indexOf("_", ind + 1);
      var num = $(this).attr("id").substring(ind + 1,ind2);
      var delNum = $(this).attr("id").substring(ind2 + 5);
      
      $(this).parent().parent().remove();
      
      var i = parseInt(delNum) + 1;
      while(true)
      {
         if($("#"+prefix+"_"+num+"_del_"+i).length)
         {
            $("input[name='"+prefix+"_"+num+"_pred_"+i+"']").attr("name",""+prefix+"_"+num+"_pred_"+(i-1));
            $("select[name='"+prefix+"_"+num+"_arg1_"+i+"']").attr("name",""+prefix+"_"+num+"_arg1_"+(i-1));
            $("select[name='"+prefix+"_"+num+"_arg2_"+i+"']").attr("name",""+prefix+"_"+num+"_arg2_"+(i-1));
            $("#"+prefix+"_"+num+"_del_"+i).attr("id",""+prefix+"_"+num+"_del_"+(i-1));
            i++;
         }
         else
         {
            break;
         }
      }
      update();
      return false;
   });
   
   // delete function for bk knowledge
   $('body').on('click', 'a.delb', function() {
      var ind = $(this).attr("id").indexOf("_");
      var prefix = $(this).attr("id").substring(0,ind);
      var delNum = $(this).attr("id").substring(ind + 5);
      
      $(this).parent().parent().remove();
      
      var i = parseInt(delNum) + 1;
      while(true)
      {
         if($("#"+prefix+"_del_"+i).length)
         {
            $("select[name='"+prefix+"_pred_"+i+"']").attr("name",""+prefix+"_pred_"+(i-1));
            $("select[name='"+prefix+"_arg1_"+i+"']").attr("name",""+prefix+"_arg1_"+(i-1));
            $("select[name='"+prefix+"_arg2_"+i+"']").attr("name",""+prefix+"_arg2_"+(i-1));
            $("#"+prefix+"_del_"+i).attr("id",""+prefix+"_del_"+(i-1));
            i++;
         }
         else
         {
            break;
         }
      }
      update();
      return false;
   });
   
   // delete function for bk predicates and arguments, also metarules
   $('body').on('click', 'a.deli', function() {
      // clear error messages
      $(".err").remove();
      
      var prefix = $(this).attr("id").substring(0,$(this).attr("id").indexOf("_"));
      var delNum = $(this).attr("id").substring(prefix.length + 5);
      
      var value = $("input[name='"+prefix+"_"+delNum+"']").val();
      
      var err = false;
      $(".s-" + prefix).each(function(index){
         if($(this).is(":visible") && $(this).val() == value){
			$(this).addClass("mg-invalid");
            $(this).parent().append("<span class='err badge badge-danger'>Cannot delete a value in use.</span>");
            err = true;
         }
      });
	 
      
      if(err && window.errorChecking == "On")
      {
         $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>There were errors below. Fix them and try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
         return false;
      }
      
      $( this ).parent().parent().remove();
      
      var i = parseInt(delNum) + 1;
      while(true)
      {
         if($("#"+prefix+"_del_"+i).length)
         {
            $("input[name='"+prefix+"_"+i+"']").attr("name",""+prefix+"_"+(i-1));
            if($("select[name='"+prefix+"_num_"+i+"']").length)
            {
               $("select[name='"+prefix+"_num_"+i+"']").attr("name",""+prefix+"_num_"+(i-1));
            }
            $("#"+prefix+"_del_"+i).attr("id",""+prefix+"_del_"+(i-1));
            i++;
         }
         else
         {
            break;
         }
      }
      
      $(".s-" + prefix).each(function(index){
         $(this).children("option").each(function(index){
            if($(this).val() == value)
               $(this).remove();
         });
      });
      
      update();
      return false;
   });
   
   // delete function for episodes
   $('body').on('click', 'a.dele', function() {
      var prefix = "episode";
      var delNum = $(this).attr("id").substring(prefix.length + 5);
      $(this).parent().parent().parent().parent().parent().remove();
      
      var i = parseInt(delNum) + 1;
      while(true)
      {
         if($("#"+prefix+"_del_"+i).length)
         {
            $("#"+prefix+"_"+i).attr("id",""+prefix+"_"+(i-1));
            $("#"+prefix+"_del_"+i).attr("id",""+prefix+"_del_"+(i-1));
            $("#pred_"+i).attr("id","pred_"+(i-1));
            $("input[name='predicate_"+i+"']").attr("name","predicate_"+(i-1));
            $("#pos_"+i).attr("id","pos_"+(i-1));
            
            var j=1;
            while($("input[name='pos_"+i+"_pred_"+j+"']").length)
            {
               $("input[name='pos_"+i+"_pred_"+j+"']").attr("name","pos_"+(i-1)+"_pred_"+j);
               $("select[name='pos_"+i+"_arg1_"+j+"']").attr("name","pos_"+(i-1)+"_arg1_"+j);
               $("select[name='pos_"+i+"_arg2_"+j+"']").attr("name","pos_"+(i-1)+"_arg2_"+j);
               j++;
            }
            
            $("#addpos_"+i).attr("id","addpos_"+(i-1));
            $("#neg_"+i).attr("id","neg_"+(i-1));
            
            j=1;
            while($("input[name='neg_"+i+"_pred_"+j+"']").length)
            {
               $("input[name='neg_"+i+"_pred_"+j+"']").attr("name","neg_"+(i-1)+"_pred_"+j);
               $("select[name='neg_"+i+"_arg1_"+j+"']").attr("name","neg_"+(i-1)+"_arg1_"+j);
               $("select[name='neg_"+i+"_arg2_"+j+"']").attr("name","neg_"+(i-1)+"_arg2_"+j);
               j++;
            }
            
            $("#addneg_"+i).attr("id","addneg_"+(i-1));
            i++;
         }
         else
         {
            break;
         }
      }
      
      update();
      return false;
   });
   
   // add a new episode
   $( "#addepisode" ).click(function(){
      $('#episode_divs').show();
      var index = $("#episode_divs .ep").length + 1;
      var episode_html = $("#episode_template").html();
      episode_html = episode_html.replace("episode_id", "episode_"+index);
      episode_html = episode_html.replace("episode_del_id", "episode_del_"+index);
      episode_html = episode_html.replace("pred_id", "pred_"+index);
      episode_html = episode_html.replace("predicate_name", "predicate_"+index);
      episode_html = episode_html.replace("pos_id", "pos_"+index);
      episode_html = episode_html.replace("addpos_id", "addpos_"+index);
      episode_html = episode_html.replace("neg_id", "neg_"+index);
      episode_html = episode_html.replace("addneg_id", "addneg_"+index);
      $("#episode_divs").append(""+episode_html);
      update();
      return false;
   });
   
   // add a new metarule
   $( "#addmeta" ).click(function() {
      var index = $("#meta tbody tr").length + 1;
      $("#meta tbody").append("<tr><td><select name='meta_"+index+"' class='form-control form-control-sm'><option>Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))</option><option>Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))</option><option>Inverse: metarule([P,Q],([P,A,B]:-[[Q,B,A]]))</option><option>Precon: metarule([P,Q,R],([P,A,B]:-[[Q,A],[R,A,B]]))</option><option>Postcon: metarule([P,Q,R],([P,A,B]:-[[Q,A,B],[R,B]]))</option><option>Tailrec: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[P,C,B]]))</option></select></td><td><a class='deli btn btn-danger btn-sm' id=\"meta_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      update();
      return false;
   });
   
   // add a new bk predicate
   $( "#addpred" ).click(function() {
      var index = $("#predicates tbody tr").length + 1;
      $("#predicates tbody").append("<tr><td><input class=\"pred form-control form-control-sm\" name=\"pred_"+index+"\" maxlength=\"50\" type=\"text\" /></td><td><select class=\"numargs form-control form-control-sm\" name=\"pred_num_"+index+"\"><option>1</option><option>2</option></select></td><td><a class='deli btn btn-danger btn-sm' id=\"pred_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      $(".s-pred").each(function(index){
         $(this).append("<option></option>");
      });
      update();
      return false;
   });
   
   // add a new bk argument
   $( "#addarg" ).click(function() {
      var index = $("#arguments tbody tr").length + 1;
      $("#arguments tbody").append("<tr><td><input class=\"arg form-control form-control-sm\" name=\"arg_"+index+"\" maxlength=\"50\" type=\"text\" /></td><td><a class='deli btn btn-danger btn-sm' id=\"arg_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      $(".s-arg").each(function(index){
         $(this).append("<option></option>");
      });
      update();
      return false;
   });
   
   // add a new bk knowledge row
   $( "#addbk" ).click(function() {
      if($(".pred").length == 0)
      {
		$("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Add predicates to use first.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
         return false;
      }
      if($(".arg").length == 0)
      {
		$("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Add arguments to use first<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
		 return false;
      }
      var index = $("#bk tbody tr").length + 1;
      $("#bk tbody").append("<tr><td><select class=\"s-pred form-control form-control-sm\" name=\"bk_pred_"+index+"\"></select></td><td><select class=\"s-arg form-control form-control-sm\" name=\"bk_arg1_"+index+"\"></select></td><td><select class=\"s-arg form-control form-control-sm\" name=\"bk_arg2_"+index+"\"></select></td><td><a class='delb btn btn-danger btn-sm' id=\"bk_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      var numArgs = 0;
      $(".pred").each(function(){
         if(numArgs == 0)
            numArgs = $("select[name='pred_num_"+$(this).attr("name").substring(5)+"']").val();
         $("select[name='bk_pred_"+index+"']").append("<option>"+$(this).val()+"</option>");
      });
      $(".arg").each(function(){
         $("select[name='bk_arg1_"+index+"']").append("<option>"+$(this).val()+"</option>");
         $("select[name='bk_arg2_"+index+"']").append("<option>"+$(this).val()+"</option>");
      });
      if(numArgs == 1)
         $("select[name='bk_arg2_"+index+"']").hide();
      update();
      return false;
   });
   
   // add a new positive example for an episode
   $('body').on('click', "a[id^='addpos']", function() {
      if($(".arg").length == 0)
      {
         $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Add arguments to use first<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
         return false;
      }
      var num = $(this).attr("id").substring("addpos_".length);
      var index = $("#pos_"+num+" tbody tr").length + 1;
      $("#pos_"+num+" tbody").append("<tr><td><input disabled class=\"form-control form-control-sm\" name=\"pos_"+num+"_pred_"+index+"\" type=\"text\" maxlength=\"50\" value=\""+$("input[name='predicate_"+num+"']").val()+"\"/></td><td><select class=\"s-arg form-control form-control-sm\" name=\"pos_"+num+"_arg1_"+index+"\" type=\"text\"></select></td><td><select class=\"s-arg form-control form-control-sm\" name=\"pos_"+num+"_arg2_"+index+"\" type=\"text\"></select></td><td><a class='del btn btn-danger btn-sm' id=\"pos_"+num+"_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      $(".arg").each(function(){
         $("select[name='pos_"+num+"_arg1_"+index+"']").append("<option>"+$(this).val()+"</option>");
         $("select[name='pos_"+num+"_arg2_"+index+"']").append("<option>"+$(this).val()+"</option>");
      });
      update();
      return false;
   });
   
   // add a new negative example for an episode
   $('body').on('click', "a[id^='addneg']", function(){
      if($(".arg").length == 0)
      {
         $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Add arguments to use first<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
         return false;
      }
      var num = $(this).attr("id").substring("addneg_".length);
      var index = $("#neg_"+num+" tbody tr").length + 1;
      $("#neg_"+num+" tbody").append("<tr><td><input disabled class=\"form-control form-control-sm\" name=\"neg_"+num+"_pred_"+index+"\" maxlength=\"50\" type=\"text\" value=\""+$("input[name='predicate_"+num+"']").val()+"\"/></td><td><select class=\"s-arg form-control form-control-sm\" name=\"neg_"+num+"_arg1_"+index+"\" type=\"text\"></select></td><td><select class=\"s-arg form-control form-control-sm\" name=\"neg_"+num+"_arg2_"+index+"\" type=\"text\"></select></td><td><a class='del btn btn-danger btn-sm' id=\"neg_"+num+"_del_"+index+"\" href=\"#\">Delete</a></td></tr>");
      $(".arg").each(function(){
         $("select[name='neg_"+num+"_arg1_"+index+"']").append("<option>"+$(this).val()+"</option>");
         $("select[name='neg_"+num+"_arg2_"+index+"']").append("<option>"+$(this).val()+"</option>");
      });
      update();
      return false;
   });
   
   // when any fields are changed or buttons are pushed, we should clear any generated code and any output
   function update()
   {
      $("#code").html("");
      $("#exec").attr("disabled",true);
      $("#output").html("");
   }
   
   // If any options are changed, we should clear any generated code and any output
   $('body').on('change', 'select', function() {
      update();
   });
   
   // If any input is changed, we should clear any generated code and any output
   $('body').on('change', 'input', function() {
      update();
   });
   
   // allow user to dynamically update bk predicate names if they'd like. prevent dups.
   $('body').on('focusin', '.pred', function(){
      $(this).data('val', $(this).val());
   }).on('change', '.pred', function() {
      var num = parseInt($(this).attr("name").substring(5));
      var oldval = $(this).data('val');
      var newval = $(this).val();
      var err = false;
      $(".pred").each(function(index){
         if(index+1 != num){
            if($(this).val() == newval){
               err = true;
            }
         }
      });
      if(err)
      {
         alert("No duplicates allowed.");
         newval = oldval;
         $(this).val(oldval);
      }
      $(".s-pred").each(function(index){
         $(this).children("option").each(function(index){
            if(index + 1 == num)
               $(this).html(newval);
         });
      });
   });
   
   // allow user to select a new predicate for a given bk knowledge row
   $('body').on('change', '.s-pred', function() {
      var num = parseInt($(this).attr("name").substring(8));
      var prednum = 0;
      $(this).children("option").each(function(index){
         if($(this).is(':selected'))
            prednum = index + 1;
      });
      var numArgs = $("select[name='pred_num_"+prednum+"']").val();
      if(numArgs == 1)
         $("select[name='bk_arg2_"+num+"']").hide();
      else
         $("select[name='bk_arg2_"+num+"']").show();
   });
   
   // Allowing the user to change the number of Arguments for a given Background Knowledge Predicate
   $('body').on('change', '.numargs', function() {
      var numArgs = parseInt($(this).val());
      var num = parseInt($(this).attr("name").substring(9));
      var predName = $("input[name='pred_"+num+"']").val();
      $(".s-pred").each(function(index){
         var prefix = $(this).attr("name").substring(0,$(this).attr("name").indexOf("_"));
         var rownum = $(this).attr("name").substring(prefix.length + 6);
         if($(this).val() == predName)
         {
            if(numArgs == 1)
               $("select[name='"+prefix+"_arg2_"+rownum+"']").hide();
            else
               $("select[name='"+prefix+"_arg2_"+rownum+"']").show();
         }
      });
   });
   
   // Allowing the user to dynamically update Argument names, but still preventing duplicates
   $('body').on('focusin', '.arg', function(){
      $(this).data('val', $(this).val());
   }).on('change', '.arg', function() {
      var num = parseInt($(this).attr("name").substring(4));
      var oldval = $(this).data('val');
      var newval = $(this).val();
      var err = false;
      $(".arg").each(function(index){
         if(index+1 != num){
            if($(this).val() == newval){
               err = true;
            }
         }
      });
      if(err) {
         alert("No duplicates allowed.");
         newval = oldval;
         $(this).val(oldval);
      }
      $(".s-arg").each(function(index) {
         $(this).children("option").each(function(index) {
            if(index + 1 == num)
               $(this).html(newval);
         });
      });
   });
   
   
   $("#exportCyto").click(function() { 
      // gets png data array from cytoscape
      var png64 = cy.png();
      
      // creates an <a> link form
      var a = $("<a>")
      .attr("href", png64)
      .attr("download", "diagram.png")
      .appendTo("body");
      a[0].click();
      
      a.remove();
   });

   // Generating the Cytoscape code
   $( "#cytoscape" ).click(function() {
      $("#cytoscode").val("");
	  
	   cy.elements().remove();
      
		var layout = cy.layout({
		  name: 'breadthfirst'
		});
	  
      // Clear error messages
      $(".err").remove();
      
      var err = false;
      
	  // Checking the background knowledge table for values, else throw error
      if(!err) {
         var index = $("#bk tbody tr").length;
         if(index == 0) {
            $("#bk").parent().append("<span class='err badge badge-danger'><br/>Cannot be empty</font></p></span>");
            err = true;
         }
      }

      if(err){
         $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>There were errors below. Fix them and try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
      }
      else {
		// Getting the arguments for the nodes
		//var prims = [];
		 var indexarg = $("#arguments tbody tr").length;
		 for(var i=1;i<=indexarg;i++) {
            var name = $("input[name='arg_"+i+"']").val();
			var eles1 = {
                data: { id: $("input[name='arg_"+i+"']").val() },
				position: {
					x: Math.random()*500,
					y: Math.random()*500
				}
           };
            name += "/1";
            //if($.inArray(name,prims) == -1)
               //prims.push(name);
			layout.run();
			cy.add(eles1);
			cy.fit();
         }
		 
		 // Getting the background knowledge for the relationships
		 var indexbk = $("#bk tbody tr").length;
         for(var i=1;i<=indexbk;i++) {
            var name = $("select[name='bk_pred_"+i+"']").val();
			var eles2= {
                data: {
                    label: $("select[name='bk_pred_"+i+"']").val(),
                    source: $("select[name='bk_arg1_"+i+"']").val(),
                    target: $("select[name='bk_arg2_"+i+"']").val()
                }
            };
            console.log("Added label : " + i);

            //if($.inArray(name,prims) == -1)
               //prims.push(name);
			   
			layout.run();
			cy.add(eles2);
			cy.fit();
         }
      }
      return false;
   });

      // Generates a diagram of the output using the rule it generated that gets put through the cytoscape library
      $( "#cytoscape2" ).click(function() {
         $("#cytoscode").val("");
      
         cy.elements().remove();
         
         var layout = cy.layout({
           name: 'breadthfirst'
         });
        
         // Clear error messages
         $(".err").remove();
         
         var err = false;
         var output = $('#output').text().split('\n');
         
         // Checking the background knowledge table for values, else throw error
         if(!err) {
            if(output == null) {
               $("#bk").parent().append("<span class='err badge badge-danger'><br/>Output has not been generated, please click generate code and execute code</font></p></span>");
               err = true;
            }
         }
   
         if(err){
            $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>There were errors below. Fix them and try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            window.scrollTo(0,0);
         }
         else {
            var currLine = " ";
            var addRules = false;
            var rules = [];
            // puts all the rules generated into an array list
            for(var i = 0; i < output.length; i++) {
               if(currLine.includes('clauses') && !output[i].includes('clauses')){
                  addRules = true;
               }
               if(addRules && !output[i].includes('true') && output[i] !== "") {
                  rules.push(output[i])
               }
               // if the current line is blank, all the rules have been added so it stops
               else {
                  addRules = false;
               }
               currLine = output[i];
            }
            var mainLine = rules[rules.length-1].replace(/[.,\/#!$%\^&\*;:{}=\-`~]/g,"");
            var addNode = false;
            var argument = "";
            var Source = "";
            var Target = "";
            var start = 0;

            /**  uses the last rule to make a network diagram representing how it links
                 The nodes are made from whats inside the brackets and the labels are created from the argument left of the brackets

            */
            for(var i =0; i < mainLine.length;i++) {

               // adds the label
               if(mainLine.charAt(i) == ")") {
                  addNode = false;
                  var eles2= {
                     data: {
                        label: argument,
                        source: Source,
                        target: Target
                     }
                  };

                  argument = "";
                  Source = "";
                  Target = "";
                  start = i+1;

                  layout.run();
                  cy.add(eles2);
                  cy.fit();
               }

               // adds the nodes which are in the middle of the brackets
               if(addNode == true) {
                  var eles1 = {
                     data: { id: mainLine.charAt(i) },
                     position: {
                        x: Math.random()*300,
                        y: Math.random()*300
                     }
                  };
                  if(Source === "") Source = mainLine.charAt(i);
                  else Target = mainLine.charAt(i);
                  layout.run();
                  cy.add(eles1);
                  cy.fit();
               } 

               // saves the label when the bracket starts
               if(mainLine.charAt(i) == '('){
                  addNode = true;
                  argument = mainLine.substr(start,i-start);
               } 
            }
         }
         return false; 
      });
   
	   // Make diagram from file
      $( "#cytoscapeFile" ).click(function() {
         $("#file").click();
       });
       $('body').on('change', '#file', function() {
          $("#cytoscode").val("");
            
          cy.elements().remove();
          
          var layout = cy.layout({
            name: 'breadthfirst'
          });
          var file = this.files && this.files[0];
          var fileReader = new FileReader();
          fileReader.onload = function (e) {
              var fileText = e.target.result;
              var text = fileText.split("\n");
              console.log(text);
              for(var i = 0; i < text.length; i++) {
                var line = text[i].replace(/[.,\/#!$%\^&\*;:{}=\-`~]/g,"");
                var addNode = false;
                var argument = "";
                var Source = "";
                var Target = "";
                var start = 0;
                /**  uses the last rule to make a network diagram representing how it links
                     The nodes are made from whats inside the brackets and the labels are created from the argument left of the brackets
                */
                for(var j =0; j < line.length;j++) {
                   // adds the label
                   if(line.charAt(j) == ")") {
                      console.log("added label");
                      addNode = false;
                      var eles2= {
                         data: {
                            label: argument,
                            source: Source,
                            target: Target
                         }
                      };
                      argument = "";
                      Source = "";
                      Target = "";
                      start = j+1;
                      layout.run();
                      cy.add(eles2);
                      cy.fit();
                   }
                   // adds the nodes which are in the middle of the brackets
                   if(addNode == true) {
                      var eles1 = {
                         data: { id: line.charAt(j) },
                         position: {
                            x: Math.random()*300,
                            y: Math.random()*300
                         }
                      };
                      if(Source === "") Source = line.charAt(j);
                      else Target = line.charAt(j);
                      layout.run();
                      cy.add(eles1);
                      cy.fit();
                   } 
                   // saves the label when the bracket starts
                   if(line.charAt(j) == '('){
                      addNode = true;
                      argument = line.substr(start,j-start);
                   } 
                }   
             }
          }
          fileReader.readAsText(this.files[0]);
       });

   // Generating the code
   $( "#gen" ).click(function() {
      $("#code").val("");
      
      // clear error messages
      $(".err").remove();
      
      var err = false;
      
	  // Error checking
      $("input").each(function( index ) {
         if($(this).is(":visible") && !$(this).attr("disabled") && $(this).attr("type") != "button" && $(this).attr("id") != "customFile" && $(this).attr("name") != "runname" && $(this).attr("name") != "saverun") {
            if($(this).val().length == 0){
               $(this).parent().append("<span class='err badge badge-danger'><br/>Cannot be empty</span>");
               err = true;
            }
            else if(!$(this).val().match(/^[a-z][a-zA-Z_0-9]*$/))
            {
               $(this).parent().append("<span class='err badge badge-danger'><br/>Must start lower-case a-z and contain a-z, A-Z, 0-9, or _ only.</span>");
               err = true;
            }
         }
      });
	  
      // Error checking
      if(!err) {
         var index = $("#meta tbody tr").length;
         if(index == 0) {
            $("#meta").parent().append("<span class='err badge badge-danger'><br/>Cannot be empty</span>");
            err = true;
         }
      }
      
      if(err) {
         $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>There were errors below. Fix them and try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
         window.scrollTo(0,0);
      } else {
         var ex="";
         ex += ":- use_module('../metagol').\n";
         ex += "\n";
         ex += "%% background knowledge\n";
         
         var prims = [];
         var index = $("#bk tbody tr").length;
         for(var i=1;i<=index;i++) {
            var name = $("select[name='bk_pred_"+i+"']").val();
            ex += $("select[name='bk_pred_"+i+"']").val() + "(" + $("select[name='bk_arg1_"+i+"']").val();
            if($("select[name='bk_arg2_"+i+"']").is(":visible")){
               ex += "," + $("select[name='bk_arg2_"+i+"']").val() + ").\n";
               name += "/2";
            } else {
               ex += ").\n";
               name += "/1";
            }
            if($.inArray(name,prims) == -1)
               prims.push(name);
         }
         
         ex += "\n";
         
         ex += "%% tell metagol to use the BK\n";
         for(var i=0;i<prims.length;i++)
            ex += "prim("+prims[i]+").\n";
         
         ex += "\n";

         ex += "%% metarules\n";
         var index = $("#meta tbody tr").length;
         for(var i=1;i<=index;i++) {
            var rule = $("select[name='meta_"+i+"']").val();
            rule = rule.substring(rule.indexOf(":") + 2);
            ex += rule + ".\n";
         }

         ex += "\n";
         
         ex += "%% learn from examples\n";
         
         var num = 1;
         
         var tlist = "";
         var learnStr = "";
         learnStr += "a :-\n";
         while(num <= $("#episode_divs .ep").length) {
            tlist += "T"+num+",";
            learnStr += "T"+num+" = [\n";
            var index = $("#pos_"+num+" tbody tr").length;
            for(var i=1;i<=index;i++) {
               if(!$.inArray($("select[name='pos_"+num+"_pred_"+i+"']").val(),prims))
                  prims.push($("select[name='pos_"+num+"_pred_"+i+"']").val());
               learnStr += $("input[name='pos_"+num+"_pred_"+i+"']").val() + "(" + $("select[name='pos_"+num+"_arg1_"+i+"']").val();
               if($("select[name='pos_"+num+"_arg2_"+i+"']").is(":visible"))
                  learnStr += "," + $("select[name='pos_"+num+"_arg2_"+i+"']").val() + ")" + (i == index ? "" : ",") + "\n";
               else
                  learnStr += ")" + (i == index ? "" : ",") + "\n";
            }
            learnStr += "]/[\n";
            var index = $("#neg_"+num+" tbody tr").length;
            for(var i=1;i<=index;i++) {
               if(!$.inArray($("select[name='neg_"+num+"_pred_"+i+"']").val(),prims))
                  prims.push($("select[name='neg_"+num+"_pred_"+i+"']").val());
               learnStr += $("input[name='neg_"+num+"_pred_"+i+"']").val() + "(" + $("select[name='neg_"+num+"_arg1_"+i+"']").val();
               if($("select[name='neg_"+num+"_arg2_"+i+"']").is(":visible"))
                  learnStr += "," + $("select[name='neg_"+num+"_arg2_"+i+"']").val() + ")" + (i == index ? "" : ",") + "\n";
               else
                  learnStr += ")" + (i == index ? "" : ",") + "\n";
            }
            learnStr += "],\n\n";
            num++;
         }
         tlist = tlist.substring(0,tlist.length - 1);
         ex += learnStr;
         ex += "learn_seq(["+tlist+"],Prog),\n";
         ex += "pprint(Prog).\n";
         
         ex = ex.replace(/(?:\n)/g, '<br/>');
         $("#code").html(ex);
         $("#exec").attr("disabled",false);
      }
      return false;
   });
      
   // Executing the code on the Metagol server. 10 minute timeout due to potential code complexity.
   $( "#exec" ).click(function(){
      $("#output").html("Running...");
      window.timeout = true;
      setTimeout(function(){ if(window.timeout) $("#output").html("Execution timed out."); }, 60000);
      $.post("exec.php", $("#form").serialize(), function(data){
         window.timeout = false;
         $("#output").html(data);
      });
      return false;
   });
   
   // Make bootstrap fileupload function display the file name
   // https://codepen.io/nopr/pen/rpsnd
	$("[type=file]").on("change", function(){
     // Name of file and placeholder
     var file= "";
     for(var i = 0; i < this.files.length;i++) file += this.files[i].name + " ";
	  
	  var dflt = $(this).attr("placeholder");
	  if($(this).val()!=""){
		$(this).next().text(file);
	  } else {
		$(this).next().text(dflt);
	  }
	});
	
   // File upload
    $('body').on('change', '#customFile', function() {
		var fileverif = this.files[0].name;
		var ext = fileverif.split('.').pop();
		
		if(ext=="pl"){
            var file = $(this).prop('files')[0];
			var data = new FormData();
			data.append("file", file);
			$.ajax({
			 type: 'POST',
			 url: 'parsefile.php',
			 data: data,
			 dataType: 'json',
			 cache: false,
			 processData: false, 
			 contentType: false,
			 success: function(data, textStatus, jqXHR) {
				// Putting the data into the correct format and then entering into fields
				var file_array=data;
				setArguments(file_array[0]);
				setPredicates(file_array[1][0],file_array[1][1]);
				setBackgroundKnowledge(file_array[2]);
				},
			});
			// Clearing the episodes fields
			clearEpisodes();
			// Clearing any generated code
			update();
        } else	{
            $("#alert").html("<div id='erralert' class='alert alert-danger alert-dismissible fade show'>Only .pl files can be uploaded! Please click the help button if you need assistance.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			window.scrollTo(0,0);
        }
		
      return false;
   });
   
   
    // Load saved run
    $(".run").click(function() {
		// Getting the run ID
		run_id = $(this).attr("data-run");
		
		var data = new FormData();
		data.append("runid", run_id);
		console.log(run_id);
		$.ajax({
			type: 'POST',
			url: 'loadrun.php',
			data: data,
			dataType: 'json',
			cache: false,
			processData: false, 
			contentType: false,
			success: function(data, textStatus, jqXHR) {
				var saved_array=data;

				// Putting all of the data from the array into the fields of the page
				if (saved_array[0].length != 0) {
					setArguments(saved_array[0]);
				};
				if (saved_array[1].length != 0) {
					setPredicates(saved_array[1][0],saved_array[1][1]);
				};
				if (saved_array[2].length != 0) {
					setMetarules(saved_array[2]);
				};
				if (saved_array[3].length != 0) {
					setBackgroundKnowledge(saved_array[3]);
				};
				if (saved_array[5].length != 0) {
					setRunname(saved_array[5]);
				};
				
				// Predicates to learn must be done iteratively as we do not know how many there may be.
				r = 0;
				while(r < saved_array[4].length) {
					if (saved_array[4][r].length != 0) {
						addEpisode(saved_array[4][r][0],saved_array[4][r][1],saved_array[4][r][2]);;
					};
					r++;
				}

            },
        });
		// Clearing the episodes fields
		clearEpisodes();
		// Clearing any generated code
		update();
      return false;
   });
   
   
   // Deleting a run
	delrun_id = 0;
	// Storing the ID on click
   $(".deleterun").click(function() {
		delrun_id = $(this).attr("data-run");
   });
   
   // Sending the ID data for the SQL query in deleterun.php
   $(".deleterunbut").click(function() {
		var data = new FormData();
		data.append("runid", delrun_id);
		console.log(delrun_id);
		$.ajax({
         type: 'POST',
		 url: 'deleterun.php',
		 data: data,
         dataType: 'json',
		 cache: false,
         processData: false, 
         contentType: false,
         success: function(data, textStatus, jqXHR) {
			
            },
        });
		window.location.reload(true);
      return false;
   });
   
   // Log out
    $( "#logout" ).click(function(){
		$.post("logout.php", $("#form").serialize(), function(data){
			window.location.reload(true);
		});
		return false;
	});
   
   
    // Dismissing messages
    $( "#dismiss" ).click(function(){
		// Trigger dismiss.php which will unset the message
		$.post("dismiss.php");
		$(".alert").alert('close');
		return false;
	});
	
	// Sending the user to the reset Modal if the URL describes it
	if(window.location.href.indexOf('#resetModal') != -1) {
		$('#resetModal').modal('show');
	}

});