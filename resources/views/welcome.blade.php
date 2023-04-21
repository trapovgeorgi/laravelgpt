<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@vite('resources/css/app.css')
	<title>LaravelGPT</title>
</head>

<body>
	<div class="flex bg-secondary text-text">
		<div class="flex min-h-screen w-[20rem] flex-col justify-between bg-primary p-2 max-md:hidden">
			<a href="/new" class="flex w-full items-center justify-start gap-2 rounded-md border-[0.5px] border-text/20 p-3 text-sm transition-colors duration-300 hover:bg-secondary">
				<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
					<line x1="12" y1="5" x2="12" y2="19"></line>
					<line x1="5" y1="12" x2="19" y2="12"></line>
				</svg>
				New chat
			</a>
			<div class="border-t-[0.5px] border-text/20 py-4">
				LaravelGPT
			</div>
		</div>
		<div class="flex min-h-screen w-full flex-col bg-secondary">
			<div class="flex h-full flex-col items-center justify-start">
				@forelse (session("conversation") ?? [] as $message)
					@if (!$loop->first)
						<x-message role="{{ $message['role'] }}" text="{{ $message['content'] }}" />
					@endif
				@empty
					<div class="flex h-full items-center justify-center text-3xl font-bold">LaravelGPT</div>
				@endforelse
			</div>
			<div class="relative flex h-[8rem] items-center justify-center">
				<form method="POST" action="/" class="absolute bottom-8 flex w-[40rem] max-w-[90%] rounded-md bg-secondary_light p-2 shadow-[0px_0px_20px] shadow-primary/40">
					@csrf
					<textarea id="textarea" name="message" class="h-8 w-full resize-none border-none bg-inherit p-1 outline-none" type="text" placeholder="Send a message..."></textarea>
					<button class="flex items-end justify-center py-2 px-1 text-[rgb(142,142,160)]">
						<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="mr-1 h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<line x1="22" y1="2" x2="11" y2="13"></line>
							<polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
						</svg>
					</button>
				</form>
			</div>
		</div>
	</div>
	<div>

	</div>
	<script src="/js/input.js"></script>
</body>

</html>
