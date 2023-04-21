@if ($role == 'assistant')
	<div class="flex w-full items-center justify-center bg-zinc-800 py-8">
		<div class="flex w-[90%] max-w-[50rem] justify-between gap-4">
			<div class="h-8 w-8 rounded-sm bg-slate-500"></div>
			<div class="w-full">{!! html_entity_decode(nl2br(e($text))) !!}</div>
		</div>
	</div>
@else
<div class="flex w-full items-center justify-center bg-zinc-700 py-8">
    <div class="flex w-[90%] max-w-[50rem] justify-between gap-4">
        <div class="h-8 w-8 rounded-sm bg-slate-400"></div>
        <div class="w-full">{!! html_entity_decode(nl2br(e($text))) !!}</div>
    </div>
</div>
@endif
