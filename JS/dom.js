//DOM 
const con1 = document.getElementById("container");
console.log(con1)
const con2 = document.getElementById("container1");
console.log(con2)
const div = con1.getElementsByTagName("div");

console.log(div);
const evenDev = con1.querySelectorAll("div:nth-of-type(2n)");
for(let i = 0; i < evenDev.length; i++){
    evenDev[i].style.backgroundColor = "darkblue";
}