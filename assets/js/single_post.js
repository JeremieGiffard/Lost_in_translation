/* * * * * * * * * * * * * * *
 *
 *  Functions exclusive for single_post.phtml
 *
 * * * * * * * * * * * * * * */



/* * * * * * * * * * * * * * *
 * Set story text color 
 * * * * * * * * * * * * * * */
let selectColor = document.querySelector('.setColor');
selectColor.addEventListener("change", setColor);

function setColor() {
  let output = selectColor.options[selectColor.selectedIndex].value;

  document.querySelector('.post-body-div').style.color = output;
  console.log("Color :" + output);
};

/* * * * * * * * * * * * * * *
 * Set story text size
 * * * * * * * * * * * * * * */
document.querySelector('.setSize').addEventListener("change", function() {
  let output = document.querySelector('.setSize').options[document.querySelector('.setSize').selectedIndex].value;

  document.querySelector('.post-body-div').style.fontSize = output;
  console.log(`Size : ${output}`);
});


/* * * * * * * * * * * * * * *
 * Set story text max-width with a switch
 * * * * * * * * * * * * * * */
let maxWidth = document.querySelector('.setMaxWidth');
maxWidth.addEventListener("change", setMaxWidth);

function setMaxWidth() {

  let output = maxWidth.options.selectedIndex;
  let postBodyDiv = document.querySelector('.post-body-div');
  console.log('MaxWidth :' + maxWidth.options[maxWidth.selectedIndex].text);
  switch (output) {
    case 0:
      postBodyDiv.style.maxWidth = "100%";
      break;
    case 1:
      postBodyDiv.style.maxWidth = "90%";
      break;
    case 2:
      postBodyDiv.style.maxWidth = "80%";
      break;
    case 3:
      postBodyDiv.style.maxWidth = "70%";
      break;
    case 4:
      postBodyDiv.style.maxWidth = "60%";
      break;
    case 5:
      postBodyDiv.style.maxWidth = "50%";
      break;

  }
}

/* * * * * * * * * * * * * * *
 * Set post text font family
 * * * * * * * * * * * * * * */
let FontFamily = document.querySelector('.setFontFamily');
FontFamily.addEventListener("change", setFontFamily);

function setFontFamily() {

  let output = FontFamily.options[FontFamily.selectedIndex].value;
  console.log('setFontFamily :' + output);
  let postBodyDiv = document.querySelector('.post-body-div').style.fontFamily = output;

}


/* * * * * * * * * * * * * * *
 * Set story background color
 * * * * * * * * * * * * * * */
let selectBgColor = document.querySelector('.setBGColor');
selectBgColor.addEventListener("change", setBgColor);

function setBgColor() {
  let output = selectBgColor.options[selectBgColor.selectedIndex].text;

  document.querySelector('.post-body-div').style.backgroundColor = output;
  console.log("BgColor :" + output);
};


/* * * * * * * * * * * * * * *
 * Set nightMode/ darkReader
 * * * * * * * * * * * * * * */


let nightMode = document.querySelector('.nightMode');
nightMode.addEventListener("change", setNightMode);

function setNightMode() {
  if (nightMode.options[nightMode.selectedIndex].text == "Dark") {
    document.querySelector('.full-post-div').style.backgroundColor = "#262626";
    document.querySelector('.full-post-div').style.color = "#cccccc";
  }
  else {
    document.querySelector('.full-post-div').style.backgroundColor = "";
    document.querySelector('.full-post-div').style.color = "";
  }
}
