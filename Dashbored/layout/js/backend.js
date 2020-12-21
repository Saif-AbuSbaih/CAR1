$(function (){
    'use strict';
    
  var old_place;
    $('input').click(function (){
         old_place= $(this).attr('placeholder');
        //alert(old_place);
        $(this).attr('placeholder','');
        
        

    });

    $('input').blur(function (){
        $(this).attr('placeholder', old_place);
         

        });
        
        

      $('input').each(function (){
        if($(this).attr('required') === 'required') {
          $(this).after('<span class="astrisk" style="position: absolute;right: 25;top: 13.8;color:#ec2d2d;font-size: 30px;"> * </span>');
          
        }
      });

  var passField = $('.password');
  $('.show-pass').hover(function ()  {
    
    passField.attr('type', 'text');

  }, function () {

    passField.attr('type', 'password');
        
  });
  $('.confirm').click(function(){
    return confirm('Are you sure?');
  })
     
});

