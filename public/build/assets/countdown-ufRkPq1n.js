function r(e,t){t===void 0&&(t=function(){});var s=e instanceof Date?e.getTime():new Date(e).getTime(),n=window.requestIdleCallback||function(a){return setTimeout(a,0)};return window.setInterval(function(){return n(function(){var a=new Date().getTime(),o=s-a;t({days:Math.floor(o/864e5),hours:Math.floor(o%864e5/36e5),minutes:Math.floor(o%36e5/6e4),seconds:Math.floor(o%6e4/1e3)})})},1e3)}const i=(e,t,s)=>{const n=e.querySelector(`.countdown-${t}`);n&&(n.innerHTML=s)},u=()=>{const e=document.querySelector(".countdown");if(!e||!e.dataset.start)return;const t=new Date(e.dataset.start);r(t,({days:s,hours:n,minutes:a,seconds:o})=>{i(e,"days",s),i(e,"hours",n),i(e,"minutes",a),i(e,"seconds",o),e.classList.remove("hidden"),e.classList.add("flex")})};u();