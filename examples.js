$(document).ready(function() 
{
    $('.read').click(function()
    {
      $(".pics_card").addClass("pics_card_after").removeClass("pics_card");
      $(".card").addClass("card_after").removeClass("card"); 
      $(".txt_titre_card").addClass("txt_titre_card_after").removeClass("txt_titre_card"); 
      $(".txt_desciption_card").addClass("txt_desciption_card_after").removeClass("txt_desciption_card"); 
    });
    $('.menu_btn').click(function()
    {
      $(".pics_card_after").addClass("pics_card").removeClass("pics_card_after");
      $(".card_after").addClass("card").removeClass("card_after"); 
      $(".txt_titre_card_after").addClass("txt_titre_card").removeClass("txt_titre_card_after"); 
      $(".txt_desciption_card_after").addClass("txt_desciption_card").removeClass("txt_desciption_card_after"); 
    });
});