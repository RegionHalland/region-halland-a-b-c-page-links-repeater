{{--
	Template Name: ABC-lista
--}}

@extends('layouts.app')

@section('content')

<main class="bg-white pt-16 pb-8" id="main">
	<div class="container mx-auto px-4">
		<div class="w-full mx-auto">
			<h1 class="mb-4">{!! get_the_title() !!}</h1>
			@php($myLinks = get_region_halland_acf_abc_page_links())  
			@if(isset($myLinks['allLetters']))
			  @foreach ($myLinks['allLetters'] as $link)
			    @if($link['has_content'] == 1)
			    <a href="http://exempel.se/min-sida/#{{ $link['start_letter'] }}">{{ $link['start_letter'] }}</a>
			    @else
			    <span>{{ $link['start_letter_u'] }}</span>
			    @endif
			  @endforeach
			@endif
			@if(isset($myLinks['content']))
			  @foreach ($myLinks['content'] as $link)
			    @if($link['has_anchor_link'] == 1)
			       <a name="{{ $link['start_letter'] }}">{{ $link['start_letter_u'] }}</a><br>
			    @endif
			    <a href="{{ $link['link_url'] }}" target="{{ $link['link_target'] }}">{{ $link['link_title'] }}</a><br>
			  @endforeach
			@endif
		</div>
	</div>
</main>

@endsection