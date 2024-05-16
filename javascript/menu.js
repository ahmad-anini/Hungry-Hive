let cards=document.querySelectorAll(".card-text")
for(let card of cards){
let text=card.innerText
if(text<=30){
    continue;
}
card.innerText=text.substring(0,60)+'...'
}
let food=document.querySelectorAll(".food")
function showfood(type){
    for(let i of food){
        i.setAttribute("hidden",true)
        if(i.classList.contains(type)){
            i.removeAttribute("hidden")
        }
    }
}
showfood("burgers")
document.querySelector("#burgers").addEventListener("click",function(){
    showfood("burgers")
})
document.querySelector("#pizzas").addEventListener("click",function(){
    showfood("pizzas")
})
