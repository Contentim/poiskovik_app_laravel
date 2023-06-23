<template>
  <div>
    <div id="dropdown" />
    <div class="flex flex-col">
      <div class="flex flex-col h-screen">
        <div class="flex flex-shrink-0">
          <!-- <div class="flex items-center justify-between px-6 py-4 bg-very_peri md:flex-shrink-0 md:justify-center md:w-56">
            <Link class="mt-1" href="/">
              <logo class="fill-white" width="120" height="28" />
            </Link>
            <dropdown class="md:hidden" placement="bottom-end">
              <template #default>
                <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
              </template>
              <template #dropdown>
                <div class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg">
                  <main-menu />
                </div>
              </template>
            </dropdown>
          </div> -->

         
        </div>
        <div class="flex flex-grow overflow-y-auto" scroll-region>
          <main-menu class="flex flex-col justify-between content-center flex-shrink-0 p-3 w-56 bg-white overflow-y-auto border-r-4" scroll-region/>
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import Dropdown from '@/Shared/Dropdown'
import MainMenu from '@/Shared/Horizontal/MainMenu'

export default {
  components: {
    Dropdown,
    Icon,
    Link,
    Logo,
    MainMenu,
  },
  props: {
    auth: Object,
  },
  data() {
    return {
      tab: 'editor',
      menu_trigger: false,
      menu_editor: true,
      menu_explorer: false,
    }
  },
  methods: {
    
  }
}
</script>
