function openClose(input) {
  const name = 'layer_' + input;
  let obj = document.getElementsByClassName(name);
  for (let i = 0; i < obj.length; i++) {
    if (obj[i].style.display != "none") {
      obj[i].style.display = "none";
      obj[i].className = name + " close";
    }
    else {
      obj[i].style.display = "block";
      obj[i].className = name + " open";
    }
  }
}
