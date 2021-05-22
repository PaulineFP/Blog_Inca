const output = document.querySelector('#output')
const text = '   La civilisation des Incas a laissé une impression durable dans l’histoire du continent sud-américain.\n' +
    '                    Pourtant, son âge d’or a duré à peine 100 ans. Pourquoi une telle place dans l’histoire alors ? Sans\n' +
    '                    doute parce qu’ils étaient là quand les conquistadors espagnols sont arrivés, mais aussi parce\n' +
    '                    qu’ils ont su faire la synthèse des cultures précédentes.'

const ResetState = (event) => {
    output.innerHTML = ''
    DisplayText(text)
}

const DisplayText = line => {
    let charPosition = 0
    const waitForMilliseconds = 25

    setInterval(() => {
        if (charPosition < line.length) {
            charPosition++
        }
    }, waitForMilliseconds)
}

DisplayText(text)