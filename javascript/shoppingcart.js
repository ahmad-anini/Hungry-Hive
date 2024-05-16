
let numberOfProducts=document.querySelectorAll(".range");
let totalpriceElement=document.querySelector("#totalprice")
let pr=document.querySelectorAll(".price")
for(let i of pr){
    totalpriceElement.innerText=Number(totalpriceElement.innerText)+Number(i.innerText)
}
for(let i of numberOfProducts){
let count=1;
 let minus=i.firstElementChild
 let plus=i.lastElementChild
 let pra=minus.nextElementSibling
 let priceElement=i.previousElementSibling.querySelector("span")
 let price= Number(priceElement.innerText)
 minus.addEventListener("click",function(){
    if(count>1){
    count--
    pra.innerText=count
    priceElement.innerText=price*count
    totalpriceElement.innerText=Number(totalpriceElement.innerText)-price
    }

 })
 plus.addEventListener("click",function(){
    count++
    pra.innerText=count
    priceElement.innerText=price*count
    totalpriceElement.innerText=Number(totalpriceElement.innerText)+price
 })
}
