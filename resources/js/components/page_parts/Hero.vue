 
<script setup>
  import { MoveRight } from '@lucide/vue';
</script>
 <template>
 <section id="hero_section" class='relative min-h-[100svh] !pt-10 w-full align-center overflow-hidden !px-0 bg-[var(--bg-menu)] lg:grid lg:min-h-screen lg:grid-cols-[40%_60%] lg:items-center lg:pt-0'>
    <div class='relative z-30 flex flex-1 flex-col justify-end pl-6 pr-6 pt-[clamp(20rem,52svh,32rem)] md:pl-10 md:pt-[clamp(24rem,58svh,36rem)] lg:pl-20 lg:pr-0 lg:pt-36 lg:justify-center'>
      <span>СЕРТИФІКОВАНИЙ ПРАКТИЧНИЙ ПСИХОЛОГ</span>
      <h1><span class="text-[var(--text-primary)]">Світлана</span><br/><span class="!text-[var(--text-secondary)]">Дармостук</span></h1>
      <p class='w-[90%] mb-10 lg:w-100 lg:mb-10'>Мені дуже важливо допомагати людям та сім'ям досягати особистісного зростання та благополуччя.</p>
      <div class="flex w-full flex-col lg:w-[120%] lg:flex-row lg:gap-10 gap-4 lg:mb-0">
        <a href='#' class="hero-button hero-button-primary flex w-full justify-center items-center text-center gap-3 text-[var(--text-button-primary)] bg-[var(--bg-button-primary)] rounded-full lg:w-auto lg:justify-start lg:text-left"> Записатись на консультацію <MoveRight aria-hidden="true" :stroke-width="2" class="icon hidden lg:block size-5 shrink-0" /></a>
        <a href='#about_section' class="hero-button hero-button-secondary flex w-full justify-center items-center text-center text-[var(--text-button-secondary)] border border-[var(--text-button-secondary)] lg:w-fit lg:justify-start lg:text-left">Дивитись більше</a>
      </div>
      <div class="hidden lg:block hero-bottom mt-26">
        <div class="hidden lg:block w-50 h-[1px] rounded-full bg-[var(--bg-button-primary)]"></div>
        <ul class="hidden lg:block lg:flex gap-8 mt-6 mb-4" aria-label="Преимущества консультации">
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path d="M0 0h24v24H0z" fill="none" />
              <path fill="#80716A" d="M5 4h13a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-4.5l.5 3h1v1H8v-1h1l.5-3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3m5.5 13l-.5 3h3l-.5-3zM5 5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z" />
            </svg>
            <p>Онлайн</p>
          </li>
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path d="M0 0h24v24H0z" fill="none" />
              <path fill="#80716A" d="M8.75 11.17q0 1.13 1.125 2.165q1.125 1.034 1.858 1.73q.13.106.27.106t.265-.102q.751-.675 1.866-1.728t1.116-2.172q0-.727-.53-1.252q-.531-.525-1.266-.525q-.448 0-.833.172t-.621.474q-.242-.303-.626-.474q-.383-.172-.828-.172q-.727 0-1.261.525q-.535.525-.535 1.252m2.964 9.648q-.15-.025-.282-.075q-2.951-1.125-4.691-3.816Q5 14.235 5 11.1V6.817q0-.514.293-.926q.292-.412.757-.597l5.385-2q.292-.106.565-.106t.566.106l5.384 2q.464.186.757.597q.293.412.293.926V11.1q0 3.135-1.74 5.826t-4.692 3.816q-.131.05-.281.075t-.287.025t-.287-.025M12 19.9q2.6-.825 4.3-3.3t1.7-5.5V6.798q0-.192-.106-.346q-.105-.154-.298-.23l-5.384-2q-.096-.04-.212-.04t-.212.04l-5.384 2q-.193.076-.298.23Q6 6.606 6 6.798V11.1q0 3.025 1.7 5.5t4.3 3.3m0-7.861" />
            </svg>
            <p>Конфіденційність</p>
          </li>
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <path d="M0 0h20v20H0z" fill="none" />
              <path fill="#80716A" d="M17.962 5.309a.5.5 0 0 1-.108.545l-2 2A.5.5 0 0 1 15.5 8h-2.793l-1.353 1.353a1.5 1.5 0 1 1-.707-.707L12 7.293V4.5a.5.5 0 0 1 .146-.354l2-2A.5.5 0 0 1 15 2.5V5h2.5a.5.5 0 0 1 .462.309M16.293 6H14.5a.5.5 0 0 1-.5-.5V3.707l-1 1V7h2.293zm1.314 1.515C17.862 8.297 18 9.133 18 10a8 8 0 1 1-5.515-7.606l-.808.808a7 7 0 1 0 5.121 5.122zM14.9 9q.1.486.1 1a5 5 0 1 1-4-4.9v1.026A4 4 0 1 0 13.874 9z" />
            </svg>
            <p>Індивідуальний підхід</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="hero_mobile_image relative z-10 shrink-0 w-full h-full pt-10">
      <img src="/images/hero/Hero.jpeg" alt="Світлана Дармостук, практичний психолог" class="hidden lg:block w-full h-full object-cover object-top" />
    </div>

    <div class="pointer-events-none absolute inset-x-0 top-14 z-0 h-[clamp(18rem,48svh,31rem)] md:h-[clamp(24rem,56svh,34rem)] lg:hidden">
      <img src="/images/hero/Hero.jpeg" alt="Світлана Дармостук, практичний психолог"  class="h-full w-full object-cover object-top"/>
      <div class="hero-mobile-gradient absolute inset-0 bg-gradient-to-b from-transparent via-[var(--bg-menu)]/5 md:via-[var(--bg-menu)]/10 to-[var(--bg-menu)]"></div>
    </div>

    <svg class="hidden lg:block lg:absolute left-[-8] top-0 z-10 h-full w-[70%]" viewBox="0 0 650 800" preserveAspectRatio="none">
      <path d="M0 0H520 C480 100 435 170 420 280 C400 420 450 540 530 650 C560 700 580 750 605 800 H0Z" fill="#F7F1EF" />
    </svg>
  </section> 
</template>