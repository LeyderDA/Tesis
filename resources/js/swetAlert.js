Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  )

  function habilitar(){
    campoarea=document.getElementById("campoarea").value;
    val=0;
    if(campoarea==""){
      val++;
    }
    if(val==0){
      document.getElementById("campoarea").disabled = false;
    }else{
      document.getElementById("campoarea").disabled = true;
    }
    }
    document.getElementById("campoarea").addEventListener("keyup", habilitar);
    document.getElementById("btn").addEventListener("click", () =>{
      alert("llll")
    });