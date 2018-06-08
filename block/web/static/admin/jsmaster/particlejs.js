/**
 * @author Tony
 */

document.addEventListener('DOMContentLoaded', function () {
  particleground(document.getElementById('particles'), {
    dotColor: '#dadcdd',
    lineColor: '#dadcdd'
  });
  var intro = document.getElementById('intro');
  intro.style.marginTop = - intro.offsetHeight / 4 + 'px';
}, false);


/*
// jQuery plugin example:
$(document).ready(function() {
  $('#particles').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  $('.intro').css({
    'margin-top': -($('.intro').height() / 2)
  });
});
*/
