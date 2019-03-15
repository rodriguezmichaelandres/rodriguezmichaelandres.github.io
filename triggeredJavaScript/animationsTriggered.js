var $start = $('.start');
var $box = $('.box');
var $hidePlane = $('.hidePlane');
var $plane = $('.plane');
var $movement = $('.movement');
var $showPlane = $('.showPlane');

$start.on('click', function(){
	$box.addClass('js-box-animate');
});

$hidePlane.on('click', function(){
	$plane.addClass('js-plane-animate');
});

$movement.on('click', function(){
	$plane.addClass('js-plane-animate2');
});

$showPlane.on('click', function(){
	$plane.addClass('js-plane-animate3');
});