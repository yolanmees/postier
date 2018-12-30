<?php
use App\classes\Formatters\FormatterClasses;

$formatter = new FormatterClasses;
$apps = $formatter::apps();
?>
@include('workflows.assets.editor.head')
  <body>
    @include('workflows.assets.editor.nav')
    <div class="container-fluid">
      <div class="row">
        @include('workflows.assets.editor.sidebar')



        <main role="main" id="editorView" class="col-md-12 ml-sm-auto col-lg-12 px-4" style="top: 35px;">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Workflow</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
          </div>
          <div class="col-md-12" id="workflowWrapper">

          </div>
          <center>
            <button type="button" name="button" class="btn btn-dark" id="addFormatter">Stap toevoegen</button>
          </center>
        </main>
      </div>
    </div>

    <!-- <div class="col-md-12">
      <br />
      <div class="textarea form-control" style="height: 250px;" contenteditable>
        <img src="https://picsum.photos/1090/230" alt="">
      </div>
      <div class="col-md-12 insert">
        <button class="btn btn-dark" id="insert">insert</button>

      </div>
    </div> -->






    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>



    <script type="text/javascript">
      var json = [{'name':'yolan', 'lastname':'mees'}]


      $('#insert').on('click', function(){
        console.table(json);
        var options = createInsertOptions(json)
      });
      function createInsertOptions(json){
        var table = document.createElement('table');
        $('.insert').appendChild(table);
      }

    </script>





    <script type="text/javascript">

      //SIDE BAR
      var apps = <?php echo json_encode($apps); ?>;
      var formatterMenuOpen = false;
      $('#addFormatter').click(function() {
        if(formatterMenuOpen == false){
          openFormatterMenu()
        }else{
          closeFormatterMenu()
        }
      });


      $('#closeFormatter').click(function() {
          closeFormatterMenu()
      });

      function openFormatterMenu(){
        $('#menuFormatters').show('slow');
        collapseEditorView()
        formatterMenuOpen = true;
      }

      function closeFormatterMenu(){
        $('#menuFormatters').animate({ "left": "-=300px", "opacity": "0.25" }, "slow" , function() {
          $('#menuFormatters').attr('style','display: none !important; min-height: 100vh; top: 35px;');
          expandEditorView()
        });
        formatterMenuOpen = false;
      }


      function collapseEditorView(){
        $('#editorView').removeClass("col-md-12 ml-sm-auto col-lg-12 px-4");
        $('#editorView').addClass("col-md-9 ml-sm-auto col-lg-10 px-4");
      }

      function expandEditorView(){
        $('#editorView').removeClass("col-md-9 ml-sm-auto col-lg-10 px-4");
        $('#editorView').addClass("col-md-12 ml-sm-auto col-lg-12 px-4");
      }

      var stepCounter = 0;
      // STEPS
      $('.AppOpenSteps').click(function() {

        var id = $(this).attr('id');
        var vendor = $(this).attr('vendor');
        var app = $(this).attr('app');
        var steps = apps[id.toLowerCase()]['steps'];

        for (x in steps) {
          var li = document.createElement("li");
          li.className = "nav-item";

          var a = document.createElement("a");
          a.className = "nav-link addStep";
          a.innerHTML = x;
          a.id = steps[x];
          a.style = "cursor: pointer;";
          a.onclick = function () {
            var card = renderPanelHTML(stepCounter);
              var div = document.createElement('div');
              $(div).load( "/workflows/renderHTML/"+vendor+"/"+app+"/"+steps[x] );
              div.className = "card-body";
              card.appendChild(div); // display data
              document.getElementById("workflowWrapper").appendChild(card);

            stepCounter++;
          };
          li.appendChild(a);
          document.getElementById("steps").appendChild(li);
        }

        $('#menuFormatters').animate({ "opacity": "0.20" }, "slow" , function() {
          $('#menuFormatters').attr('style','display: none !important; min-height: 100vh; top: 35px;');
          $('#menuSteps').show("slow");
        });


      });


      $('#closeSteps').click(function() {
        $('#menuSteps').animate({ "opacity": "0.20" }, "slow" , function() {
          $('#menuSteps').attr('style','display: none !important; min-height: 100vh; top: 35px;');
          $('#menuFormatters').show("slow");
        });
        $('#steps').empty();
      });


      function renderPanelHTML(id){
        var card = document.createElement("div");
        card.className = "card";
        card.id = "step-"+id;

        return card;
      }




    </script>





  </body>
</html>
