$(document).ready(function() {

    // Replace empty content area with XML on load
    var placeFormResultXML = function(result){
        $("#generatedXML").html('<h3>Result</h3><pre><code class="xml">'+result+'</code></pre>');
        $('pre code').each(function(i, e) {hljs.highlightBlock(e)});

    }

    $("#generate_btn").click(function(){

        // Form action
        $('#generate_criteria').ajaxForm({
            success: function(response){
                placeFormResultXML(response)
            }
        });

    });

});