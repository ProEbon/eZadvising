/**
 * Created by rjlewis on 11/8/2015.
 */

var poop = [];

function RiceTester() {
    alert('Hello');
    $.ajax({
        url: "index.php",
        method: 'POST',
        data: {
            op: 'toxic',
            plan: 1
        },
        success: function (result) {
            alert(result);
            //var google = JSON.parse(result); //reqs is array of requirement objects


            //for (var i = 0; i < google.length; i++) {
            //    poop[i] = google[i].courseId;
            //    alert("Course ID: " + poop[i]);
            //}
            //return result;
        }//end success
    });//end ajax

}