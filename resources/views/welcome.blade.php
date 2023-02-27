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
