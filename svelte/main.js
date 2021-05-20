import App from './App.svelte';

const app = new App({
	//target: document.body
	//target:  replaceContents( document.querySelector( '#target' ))
	target: document.getElementById("target"),
});

export default app;
