<?php
    include 'header.php';
    include '../database/database.php';
    include '../database/controller.php';
    $db = new Database();
    $controller = new Controller($db->DBConnect());
    if($_SESSION['ulevel'] == 'Siswa'){
        $cekPendaftaran = $controller->cekPendaftaranPengguna($_SESSION['uid']);
    }
    $soal = $controller->tampil_data('ujian_masuk');

    if(isset($_POST['submit'])){
        $nilai = $_POST['nilai'];
        $pengguna_id = $_POST['pengguna_id'];
        $update = $controller->updateNilaiPengguna($pengguna_id,$nilai);
        if($update){
            return true;
        }else{
            return false;
        }
    }

?>
        <?php if($cekPendaftaran==null):?>
            <section class="box-formulir" id="text-center">
            <h2 class="text-center" style="margin-top: 20vh;">Anda Tidak Dapat Mengakses Fitur Ini</h2>
            </section>
        <?php elseif($_SESSION['ulevel']=='Siswa' && $cekPendaftaran->nilai!=null): ?>
            <section>
                <h2 class="text-center" style="margin-top: 20vh;">Anda Telah Menyelesaikan Test Ini, Skor Anda <?= $cekPendaftaran->nilai ?></h2>
            </section>
        <?php else: ?>
            <div id="container" style="margin-top: 20vh;">
            <div id="title">
                <h1>Test Masuk</h1>
            </div>
            <br />
            <div id="quiz"></div>
            <div class="button" id="next"><a href="#">Next</a></div>
            <div class="button" id="prev"><a href="#">Prev</a></div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
            (function() {
                    var questions = [
                        <?php
                            foreach($soal as $row):
                        ?>
                        {
                            question: "<?= $row->soal ?>",
                            choices: ["<?=  $row->opsiA ?>", "<?=  $row->opsiB ?>", "<?= $row->opsiC ?>"],
                            correctAnswer: "<?= $row->jawaban ?>",
                        },
                        <?php endforeach ?>
                    ];
                    
                    
                    var questionCounter = 0; //Tracks question number
                    var selections = []; //Array containing user choices
                    var quiz = $('#quiz'); //Quiz div object
                    
                    // Display initial question
                    displayNext();
                    
                    // Click handler for the 'next' button
                    $('#next').on('click', function (e) {
                        e.preventDefault();
                        if(quiz.is(':animated')) {        
                            return false;
                        }
                        choose();
                        // If no user selection, progress is stopped
                        if (selections[questionCounter]=="") {
                        alert('Please make a selection!');
                        } else {
                        questionCounter++;
                        displayNext();
                        }
                    });
                    
                    // Click handler for the 'prev' button
                    $('#prev').on('click', function (e) {
                        e.preventDefault();
                        
                        if(quiz.is(':animated')) {
                        return false;
                        }
                        choose();
                        questionCounter--;
                        displayNext();
                    });
                    
                    // Click handler for the 'Start Over' button
                    $('#start').on('click', function (e) {
                        e.preventDefault();
                        
                        if(quiz.is(':animated')) {
                        return false;
                        }
                        questionCounter = 0;
                        selections = [];
                        displayNext();
                        $('#start').hide();
                    });
                    
                    // Animates buttons on hover
                    $('.button').on('mouseenter', function () {
                        $(this).addClass('active');
                    });
                    $('.button').on('mouseleave', function () {
                        $(this).removeClass('active');
                    });
                    
                    // Creates and returns the div that contains the questions and 
                    // the answer selections
                    function createQuestionElement(index) {
                        var qElement = $('<div>', {
                        id: 'question'
                        });
                        
                        var header = $('<h2>Pertanyaan ' + (index + 1) + ':</h2>');
                        qElement.append(header);
                        
                        var question = $('<p>').append(questions[index].question);
                        qElement.append(question);
                        
                        var radioButtons = createRadios(index);
                        qElement.append(radioButtons);
                        
                        return qElement;
                    }
                    
                    // Creates a list of the answer choices as radio inputs
                    function createRadios(index) {
                        var radioList = $('<ul>');
                        var item;
                        var input = '';
                        for (var i = 0; i < questions[index].choices.length; i++) {
                        item = $('<li>');
                        input = '<input type="radio" name="answer" value=' + questions[index].choices[i] + ' />';
                        input += questions[index].choices[i];
                        item.append(input);
                        radioList.append(item);
                        }
                        return radioList;
                    }
                    
                    // Reads the user selection and pushes the value to an array
                    function choose() {
                        selections[questionCounter] = $('input[name="answer"]:checked').val();
                    }
                    
                    // Displays next requested element
                    function displayNext() {
                        quiz.fadeOut(function() {
                        $('#question').remove();
                        
                        if(questionCounter < questions.length){
                            var nextQuestion = createQuestionElement(questionCounter);
                            quiz.append(nextQuestion).fadeIn();
                            if (!(isNaN(selections[questionCounter]))) {
                            $('input[value='+selections[questionCounter]+']').prop('checked', true);
                            }
                            
                            // Controls display of 'prev' button
                            if(questionCounter === 1){
                            $('#prev').show();
                            } else if(questionCounter === 0){
                            
                            $('#prev').hide();
                            $('#next').show();
                            }
                        }else {
                            var scoreElem = displayScore();
                            quiz.append(scoreElem).fadeIn();
                            $('#next').hide();
                            $('#prev').hide();
                            $('#start').show();
                        }
                        });
                    }
                    
                    // Computes score and returns a paragraph element to be displayed
                    function displayScore() {
                        var score = $('<p>',{id: 'question'});
                        var numCorrect = 0;
                        for (var i = 0; i < selections.length; i++) {
                            if (selections[i] == questions[i].correctAnswer) {
                                numCorrect++;
                            }
                        }
                        
                        score = 100/selections.length*numCorrect;

                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                'nilai': score,
                                'pengguna_id': <?= $_SESSION['uid'] ?>,
                                'submit': 'submit'
                            },
                            success: function(data){
                                window.location="/sekolah/siswa/pengerjaan-soal.php"
                            }
                        })
                        
                        return score;
                    }
                    })();
            </script>
        <?php endif ?>
<?php
    include 'footer.php';
?>
