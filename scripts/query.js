function askQuery(){

    let form = document.getElementById('queryForm');

  
    var displaySetting = form.style.display;

    if (displaySetting == 'block') {
      form.style.display = 'none';
    }
    else {
      form.style.display = 'block';
    }
}