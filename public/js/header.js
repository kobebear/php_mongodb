$(()=>$("#header").load("header.html",()=>{
  var $listLogin=$("#listLogin"),
      $listWelcome=$("#listWelcome");
  $.get("../routes/users/isLogin.php").then(data=>{
    if(data.ok){
      $listLogin.hide();
      $listWelcome.show().find("#uname").text(data.uname);
    }else{
      $listLogin.show();
      $listWelcome.hide();
    }
  });
  $("[data-trigger=logout]").click(()=>
    $.get("../routes/users/logout.php").then(()=>{
      location.reload();
    })
  );
}))