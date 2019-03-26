@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="text-center">Welcome back {{ $user_name }} - {{ $user_id }}</h1>
  <h2>My Watchlists</h2>
  <ul> @if (count($watchlists) > 0) @foreach ($watchlists as $entry)
      <li>
        <a href="/watchlists/{{$entry->id}}">{{ $entry->title }}</a>
      </li>
      @endforeach @else
      <p>You haven't made any lists yet</p>
      @endif
  </ul>
  <h2>My Reviews</h2>
  <ul> @if (count($reviews) > 0) @foreach ($reviews as $entry)
      <li>
        <a href="/reviews/{{$entry->id}}?movie_id={{ $entry->movie_tmdb_id}}">{{ $entry->headline }} ({{ $entry->rating }}/10)</a>
      </li>
      @endforeach @else
      <p>You haven't made any reviews yet</p>
      @endif
  </ul>
</div>
@endsection
