$(document).ready(function(){
  var startDate=moment(dateValue,'YYYY-MM-DD').utc();
  var endingDate = moment(endDate, 'YYYY-MM-DD').utc();
  var duration = moment.duration(endingDate.diff(startDate));
  var month=Math.floor(duration.asMonths());
  var days=Math.floor(duration.asDays());
  var hours=Math.floor(duration.asHours());
  var minutes=Math.floor(duration.asMinutes());
  var secs=Math.floor(duration.asSeconds());
  console.log(month);
  console.log(days);
  console.log(hours);
  console.log(minutes);
  console.log(secs);
    $("#days").text(days);
    $("#hours").text(hours);
    $("#hours").text(moment().hours(hours).format("HH"));
    $("#minutes").text(moment().minutes(minutes).format("mm"));
    setInterval(function(){
        secs--;
        $("#seconds").text(moment().seconds(secs).format("ss"));
    },1000);
});

