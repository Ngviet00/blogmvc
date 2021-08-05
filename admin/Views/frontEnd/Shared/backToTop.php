
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<style type="text/css" media="screen">
  #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: red;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 50%;
  }
  #myBtn:hover {
     background-color: #555;
  }
</style>

<script type="text/javascript">
    var mybutton = document.getElementById("myBtn");
    window.addEventListener("scroll",scroll);
    function scroll(){
      if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
          mybutton.style.display = "block";
      }else {
        mybutton.style.display = "none";
      }
    }
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>