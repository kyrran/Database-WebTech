function displayandhide(x) {
  if (x.style.display == 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';  
  }
}

function addInfo() {
  document.getElementById('show').style.display = 'none';
  document.getElementById('delete').style.display = 'none';
  document.getElementById('search').style.display = 'none';
  
  x = document.getElementById('add');
  displayandhide(x);
}

function deleteInfo() {
  document.getElementById('show').style.display = 'none';
  document.getElementById('add').style.display = 'none';
  document.getElementById('search').style.display = 'none';

  x = document.getElementById('delete');
  displayandhide(x);
}


