<template>
	<div>
		<navbar></navbar>
		<slot/>
	</div>
</template>

<script>
import Navbar from "./Navbar.vue"
export default {
	name: "Layout",
	components: {
		Navbar
	}
}
</script>