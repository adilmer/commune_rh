function checkradio(){
    if(document.getElementById('inlineRadio1').checked) {
        document.getElementById("dataagent").style.display = "block";
        document.getElementById("datamember").style.display = "none";
      }else if(document.getElementById('inlineRadio2').checked) {
        document.getElementById("dataagent").style.display = "none";
        document.getElementById("datamember").style.display = "block";
      }
  }


  function checkav(){
    if(document.getElementById('inlineRadioexam').checked) {
        document.getElementById("fieldseechl7").style.display = "none";
        document.getElementById("fieldsetav").style.display = "block";
        document.getElementById("typeav1").innerText = "examen professionnel";
        document.getElementById("typeav2").innerText = "examen professionnel";
        document.getElementById("typeav3").innerText = "examen professionnel";
      }else if (document.getElementById('inlineRadioanc').checked) {
        document.getElementById("fieldseechl7").style.display = "none";
        document.getElementById("fieldsetav").style.display = "block";
        document.getElementById("typeav1").innerText = "choix";
        document.getElementById("typeav2").innerText = "choix";
        document.getElementById("typeav3").innerText = "choix";
      }else{

        document.getElementById("fieldsetav").style.display = "none";
        document.getElementById("fieldseechl7").style.display = "block";

      }
  }




