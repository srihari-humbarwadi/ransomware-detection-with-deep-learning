window.onload = function ()
{
  $.ajaxSetup(
  {
    cache: false
  });
  result = document.getElementById("prediction");
  var dataPoints = [];
  var notify = new Notyf();
  var chart;
  var beval;
  var exval;
  var prediction = "";
  var changed = true;
  var prev;
  $.getJSON("./doughnut/data.json", function (data)
  {
    $.each(data, function (key, value)
    {
      prev = value[0];
      exval = value[0];
      beval = 100 - exval;
      prediction = exval > 50 ? value[1] + " => "+ "exploit " : value[1] + " => "+ "benign";
      dataPoints.push(
      {
        y: exval,
        indexLabel: "exploit " + exval + "%"
      });
      dataPoints.push(
      {
        y: beval,
        indexLabel: "benign " + beval + "%"  
      });
    });
    CanvasJS.addColorSet("customColorSet", [
      "#ff2200",
      "#4400ff",
    ]);
    chart = new CanvasJS.Chart("chartContainer",
    {
      colorSet: "customColorSet",
      data: [
      {
        type: "doughnut",
        dataPoints: dataPoints,
      }]
    });
    if (changed)
    {
      if(exval > 50){
        notify.alert("Exploit detected, take action");
      }
      chart.render();
      
    }
    result.innerHTML = prediction;
    updateChart();
  });

  function updateChart()
  {
    $.getJSON("./doughnut/data.json", function (data)
    { 
      console.log("Checking for updates");
      dataPoints.pop();
      dataPoints.pop();
      $.each(data, function (key, value)
      {
        console.log(value)
        changed = (prev == value[0]) ? false : true;
        prev = value[0];
        exval = value[0];
        beval = 100 - exval;
        prediction = exval > 50 ? value[1] + " => "+ "exploit " : value[1] + " => "+ "benign";
        dataPoints.push(
        {
          y: exval,
          indexLabel: "exploit " + exval + "%"
        });
        dataPoints.push(
        {
          y: beval,
          indexLabel: "benign " + beval + "%"
        });
      });if(changed){
      if(exval > 50){
        notify.alert("Exploit detected, take action");
      }      
      chart.render();
      
    }
    result.innerHTML = prediction;
      setTimeout(function ()
      {
        updateChart()
      }, 777);
    });
  }
  updateChart();
}