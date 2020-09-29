const formAddToCart=document.querySelector('.add-to-cart');
console.log(formAddToCart);
if(formAddToCart){

formAddToCart.addEventListener('submit',function(e){
	e.preventDefault();
	const data=new FormData(formAddToCart);//{qty:2,product _id:14}
	axios.post('/cart/add',data)
	.then(function(response){
		//console.log(response);
		 changeCart(response.data);

	});

});
}
function changeCart(data){
	document.querySelector('.modal-body').innerHTML=data;

	//change count
	const count = document.querySelector('.count')
	const countInCart = document.querySelector('.count-in-cart')
	if(countInCart)
		count.innerHTML = countInCart.value
	else
		count.innerHTML = 0
}
document.querySelector('.clear-cart').addEventListener('click',function(e){
	e.preventDefault();
	axios.post('/cart/clear')
	.then(function(response){
		//console.log(response.data)
		changeCart(response.data);

	});


});
document.querySelector('body').addEventListener('submit',function(e){

if(e.target.classList.contains('shirt-delete')){
	e.preventDefault();
	const data=new FormData(e.target);
	axios.post('/cart/remove',data)
	.then(function(response){
		//console.log(response);
		 changeCart(response.data);
	});
}
});




$(function(){
  $('.minimized').click(function(event) {
    var i_path = $(this).attr('src');
    $('body').append('<div id="overlay"></div><div id="magnify"><img src="'+i_path+'"><div id="close-popup"><i></i></div></div>');
    $('#magnify').css({
	    left: ($(document).width() - $('#magnify').outerWidth())/2,
	    // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
            top: ($(window).height() - $('#magnify').outerHeight())/2
	  });
    $('#overlay, #magnify').fadeIn('fast');
  });
  
  $('body').on('click', '#close-popup, #overlay', function(event) {
    event.preventDefault();
 
    $('#overlay, #magnify').fadeOut('fast', function() {
      $('#close-popup, #magnify, #overlay').remove();
    });
  });
});


let imgSm=document.querySelector('.zoom-img img');
		console.log(imgSm);
		if(imgSm){
		let imgSmW=imgSm.getBoundingClientRect().width;
		console.log(imgSmW);
		let imgSmH=imgSm.getBoundingClientRect().height;
		console.log(imgSmH);

		

		imgSm.addEventListener('mouseover',()=>{
			imgSm.style.opacity = 0;
			imgSm.parentNode.style.backgroundImage=`url(${imgSm.dataset.big})`
		})

		imgSm.addEventListener('mousemove',(event)=>{
			let x=event.offsetX*100/imgSmW;
			let y=event.offsetY*100/imgSmH;
			imgSm.parentNode.style.backgroundPosition=`${x}% ${y}%`;

			
		})
		imgSm.addEventListener('mouseout',()=>{
			imgSm.style.opacity = 1;
			imgSm.parentNode.style.backgroundImage=`none`
		})
	}






