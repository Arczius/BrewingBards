
    console.log('test');
 function ChangeActivity(Id)
  {


    $.ajax({
      type: "Post",
      url: "./Activity",
      data: { characterIdupdate : Id,},
      success: function () {
        console.log(Id);
      },
      Error: function (a, b, c) {
        console.log(a);
        console.log(b);
        console.log(c);
      },
      complete: function () {
        location.reload();
      },
    });
  }

