<template>
  <div>
    <div id="dropdown" />
    <div class="flex flex-col">
      <div class="flex flex-col h-screen">
        <div class="flex flex-shrink-0">
          <div
            class="flex items-center justify-between px-6 py-2 bg-orange_c flex-shrink-0 justify-center w-56"
          >
            <Link class="mt-1 logo" href="/">
              {{ $store.state.version }}
            </Link>
          </div>
          <div
            class="text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b-4 border-solid px-12 py-0"
          >
            <h1 class="text-3xl font-bold mt-3 mb-4">
              {{ $store.state.app_name }}
            </h1>

          </div>
        </div>
        <div class="flex flex-grow overflow-hidden bg-gray-50">
          <!-- slot --->
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Icon from "@/Shared/Icon";
import Logo from "@/Shared/Logo";
import Dropdown from "@/Shared/Dropdown";
import MainMenu from "@/Shared/Dashboard/MainMenu";

export default {
  components: {
    Dropdown,
    Icon,
    Link,
    Logo,
    MainMenu,
  },
  props: {
    user: Object,
    auth: Object,
  },
};
</script>
<style>
.logo {
  color: #fff;
  font-family: "DejaVu Sans Bold";
  padding: 0;
  margin: 0;
  font-size: 30px;
}
</style>
