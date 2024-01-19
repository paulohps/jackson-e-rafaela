import countItDown from 'count-it-down'

const updateTime = (countdown, element, time) => {
    const timeElement = countdown.querySelector(`.countdown-${element}`)

    if(timeElement) {
        timeElement.innerHTML = time
    }
}

const initCountdown = () => {
    const countdown = document.querySelector('.countdown')

    if(!countdown || !countdown.dataset.start) {
        return
    }

    const weddingDate = new Date(countdown.dataset.start)

    countItDown(weddingDate, ({days, hours, minutes, seconds}) => {
        updateTime(countdown, 'days', days)
        updateTime(countdown, 'hours', hours)
        updateTime(countdown, 'minutes', minutes)
        updateTime(countdown, 'seconds', seconds)

        countdown.classList.remove('hidden')
        countdown.classList.add('flex')

        console.log(days, hours, minutes, seconds)
    })
}

initCountdown()
