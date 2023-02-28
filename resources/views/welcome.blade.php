<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kiwify</title>
        <link rel="icon" href="icon.jpg">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body class="antialiased">
        <div class="container">
            <div class="text-center">
                <img src="{{ asset('logo.png') }}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('api.quizes.store') }}" method="POST" class="card my-3">
                        <div class="card-header">
                            <h2><b>1.</b> POST: Store Quiz</h2>
                            <p>{{ route('api.quizes.store') }}</p>
                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="Sample Title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="Sample Description" required>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-lg btn-success">Test</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <form action="{{ route('api.quiz.questions.store') }}" method="POST" class="card my-3">
                        <div class="card-header">
                            <h2><b>2.</b> POST: Store Question</h2>
                            <p>{{ route('api.quiz.questions.store') }}</p>
                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Quiz</label>
                                <select  name="quiz_id" class="form-control" required>
                                    @forelse (App\Models\Quiz::all() as $quiz)
                                        <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="Question Title" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Mandatory?</label>
                                <input type="checkbox" name="is_mandatory" class="custom-checkbox" value="yes"> Yes
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-lg btn-success">Test</button>
                        </div>
                    </form>
                </div>


                <div class="col-md-12">
                    <div class="card my-3">
                        <div class="card-header">
                            <h2><b>3.</b> GET: Quizes</h2>
                            <p>{{ route('api.quizes') }}</p>
                        </div>
                        <div class="card-body">
                            <ul>
                                @forelse (App\Models\Quiz::with('getQuestions','getQuestions.getAnswers')->get() as $quiz)
                                    <li>{{ $quiz->title }}
                                        <ul>
                                            @forelse ($quiz->getQuestions as $question)
                                                <li>{{ $question->title }}

                                                    {{-- <label for="mandatory-{{ $question->id }}" class="float-end">
                                                        <input type="checkbox" id="mandatory-{{ $question->id }}"> Mandatory
                                                    </label>
                                                    <a href="" class="btn btn-info circle-rounded float-end">
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.77 122.88" style="enable-background:new 0 0 115.77 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M89.62,13.96v7.73h12.19h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02v0.02 v73.27v0.01h-0.02c-0.01,3.84-1.57,7.33-4.1,9.86c-2.51,2.5-5.98,4.06-9.82,4.07v0.02h-0.02h-61.7H40.1v-0.02 c-3.84-0.01-7.34-1.57-9.86-4.1c-2.5-2.51-4.06-5.98-4.07-9.82h-0.02v-0.02V92.51H13.96h-0.01v-0.02c-3.84-0.01-7.34-1.57-9.86-4.1 c-2.5-2.51-4.06-5.98-4.07-9.82H0v-0.02V13.96v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07V0h0.02h61.7 h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02V13.96L89.62,13.96z M79.04,21.69v-7.73v-0.02h0.02 c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v64.59v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h12.19V35.65 v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07v-0.02h0.02H79.04L79.04,21.69z M105.18,108.92V35.65v-0.02 h0.02c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v73.27v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h61.7h0.02 v0.02c0.91,0,1.75-0.39,2.37-1.01c0.61-0.61,1-1.46,1-2.37h-0.02V108.92L105.18,108.92z"/></g></svg>
                                                    </a>
                                                    <a href="" class="btn btn-danger circle-rounded float-end">x</a> --}}
                                                    
                                                    <ul>
                                                        @forelse ($question->getAnswers as $answer)
                                                            <li class="{{ $answer->is_correct=='yes'?'text-success':'' }}">{{ $answer->title }} @if($answer->is_correct=='yes')(Correct Answer)@endif</li>
                                                        @empty
                                                            
                                                        @endforelse

                                                        <li>
                                                            <form action="{{ route('api.quize.question.answers.store') }}" method="POST">
                                                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="title"  placeholder="Add Reply Answer" required>
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" name="is_correct" class="form-check-input me-2" value="yes">correct
                                                                    </span>
                                                                    <span class="input-group-text">
                                                                        <button type="submit" class="btn btn-success">Save</button>
                                                                    </span>
                                                                    
                                                                </div>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @empty
                                                
                                            @endforelse
                                        </ul>
                                    
                                    </li>
                                @empty
                                    
                                @endforelse
                            </ul>

                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-lg btn-success">Test</button>
                        </div>
                    </div>
                </div>


            </div>
     
           
        </div>

        <div class="container-fluid">
            <div class="row bg-dark text-white py-3">
                <div class="col-6">Developed By: <a href="https://altaf.softnursery.com/" target="_blank">Altaf Hossain Limon</a></div>
                <div class="col-6 text-end">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
            </div>
        </div>
        

        
    </body>
</html>
