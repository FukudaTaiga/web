function openClose(input) {
  const name = 'layer_' + input;
  let obj = document.getElementsByClassName(name);
  for (let i = 0; i < obj.length; i++) {
    if (obj[i].style.display != 'none') {
      obj[i].style.display = 'none';
      obj[i].className = name + ' close';
    }
    else {
      obj[i].style.display = 'block';
      obj[i].className = name + ' open';
    }
  }
}

function makeToC() {
  let secs = document.getElementsByTagName('section');
  let arr = Array.prototype.slice.call(secs).map(e => e.firstElementChild.innerHTML);
  let mainc = document.getElementsByTagName('main')[0];
  let toc = document.createElement('div');
  toc.id = 'toc';
  toc.textContent = '目次';
  let list = document.createElement('ul');
  arr.forEach(e => {
    let li = document.createElement('li');
    li.textContent = e;
    list.appendChild(li);
  });
  toc.appendChild(list);
  mainc.insertBefore(toc, mainc.children[1]);
}

window.onload = () => {
  makeToC();
}
