<?php
    function php_func(){
        echo "Stay Safe";
    }
?>
<div id="aa"></div>
<button onclick="clickMe()"> Click </button>
<div id="bb"></div>
<script>
    function clickMe(){
        let result ="<?php php_func(); ?>"
        let Start = document.getElementById("aa");
        Start.innerHTML=result;
        let p;
        for(let i=0;i<10;i++){
            p = document.createElement("bb")
            p.innerHTML = '<div id="cc'+i+'"></div>';
            document.body.appendChild(p);
        }
        for(let i=0;i<10;i++){
            Start = document.getElementById("cc"+i);
            Start.innerHTML=result;
        }
    }
</script>