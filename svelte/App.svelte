<script>
	import DoubleRangeSlider from './DoubleRangeSlider.svelte';
	let start;
	let end;


	const ccc=100;

/**/
	//ziskani elementu
	var element1 = document.getElementById("frm-form-number1");
	//vemu hodnotu z elementu a dle predamji do svelteapp
	start=element1.value/ccc;
	//alemet zrusim z formulare
	element1.parentNode.removeChild(element1);
	var element2 = document.getElementById("frm-form-number2");
	end=element2.value/ccc;


	element2.parentNode.removeChild(element2);

	/**/
	const  a=element2.value;
	const nice = d => {
		if (!d && d !== 0) return '';
		return d.toFixed(2)*ccc;
	}
</script>

	<DoubleRangeSlider bind:start bind:end/>
	<div class="labels">

		<!-- parseInt() pouzivam protoze to hazelo obcas desetinna cisla-->
		<div class="label">{parseInt(nice(start))}</div>
		<div class="label">{parseInt(nice(end))}</div>
	</div>
		<input id="frm-form-number1" type="number" name="number1" value={parseInt(nice(start))} style="display: none" />
		<input id="frm-form-number2" type="number" name="number2" value={parseInt(nice(end))}  style="display: none" />
	<!--   -->



<style>

	.labels{
		margin-bottom: 30px;
	}

	.label:first-child {
		float: left;
	}

	.label:last-child {
		float: right;
	}
</style>
