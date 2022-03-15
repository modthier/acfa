@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="text-primary">Candidate Name : {{ $score->user->name }}</h4>
        <h6>Candidate Number : {{ $score->candidate_number }}</h6>
    </div>
    <div class="card-body bg-light">
       <table class="table">
            <tr>
                <td> Exam Name : {{ $score->exam->name }}</td>
                <td> Test Date : {{ $score->test_date }}</td>
                <td> Center Number {{ $score->center_number }}</td>
            </tr>
       </table>
       <h3>Overall : {{ $score->overall }}</h3>
       <table class="table table-responsive table-bordered">
        <tr>
            <td> <h4>Listening  : {{ $score->listening }}</h4></td>
            <td> <h4>Reading : {{ $score->reading }}</h4></td>
        </tr>
        <tr>
            <td> <h4>Writing {{ $score->writing }}</h4></td>
            <td> <h4>Speaking {{ $score->speaking }}</h4></td>
        </tr>
        </tr>
      </table>

      <h5>Overall Band Score : {{ $score->overall_band_score }}</h5>
      <h5>Overall Adjective {{$score->overall_adjective }}</h5>
      <h5>Overall Description :</h5>
      {!! $score->overall_description  !!}
    </div>
</div>

@endsection