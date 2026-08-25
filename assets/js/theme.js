(function(){
  'use strict';
  document.querySelectorAll('.site-header--homepage .menu-toggle').forEach(function(toggle){var menu=toggle.closest('.site-header').querySelector('.mobile-menu');if(menu){toggle.addEventListener('click',function(){var open=toggle.getAttribute('aria-expanded')==='true';toggle.setAttribute('aria-expanded',String(!open));menu.hidden=open;});menu.querySelectorAll('a').forEach(function(link){link.addEventListener('click',function(){toggle.setAttribute('aria-expanded','false');menu.hidden=true;});});}});
  document.querySelectorAll('[data-carousel]').forEach(function(carousel){
    var track=carousel.querySelector('.carousel__track'),prev=carousel.querySelector('[data-prev]'),next=carousel.querySelector('[data-next]');
    function move(dir){track.scrollBy({left:dir*track.clientWidth*.82,behavior:'smooth'});}
    if(prev)prev.addEventListener('click',function(){move(-1);});
    if(next)next.addEventListener('click',function(){move(1);});
  });
  function closeModal(modal){modal.close();modal.querySelectorAll('video').forEach(function(v){v.pause();});var stage=modal.querySelector('.media-modal__stage');if(modal.id==='proof-modal')stage.innerHTML='';}
  document.querySelectorAll('.media-modal').forEach(function(modal){modal.querySelector('.media-modal__close').addEventListener('click',function(){closeModal(modal);});modal.addEventListener('click',function(e){if(e.target===modal)closeModal(modal);});});
  document.querySelectorAll('[data-modal]').forEach(function(button){button.addEventListener('click',function(){var modal=document.getElementById(button.dataset.modal),video=modal.querySelector('video');modal.showModal();if(video){video.muted=false;video.currentTime=0;video.load();var start=function(){video.play().catch(function(){});};if(video.readyState>=2){start();}else{video.addEventListener('canplay',start,{once:true});}}});});
  var proofModal=document.getElementById('proof-modal');
  document.querySelectorAll('.proof-card').forEach(function(card){card.addEventListener('click',function(){var stage=proofModal.querySelector('.media-modal__stage');proofModal.querySelector('h2').textContent=card.dataset.proofTitle;if(card.dataset.proofType==='youtube'){stage.innerHTML='<iframe title="'+card.dataset.proofTitle+'" src="'+card.dataset.proofSrc+'" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';}else{stage.innerHTML='<video controls autoplay playsinline><source src="'+card.dataset.proofSrc+'" type="video/mp4"></video>';}proofModal.showModal();});});
  document.querySelectorAll('footer *').forEach(function(el){if(el.childNodes.length===1&&el.firstChild.nodeType===3&&el.textContent.indexOf('Copyright © 2025')!==-1)el.textContent=el.textContent.replace('Copyright © 2025','Copyright © 2026');});
}());

