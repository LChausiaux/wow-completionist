<template>
    <div class="wrapper">
        <div class="header row"
             :style="{backgroundImage: 'url(' + this.characterBackground + ')'}">
            <div class="summary">
                <img :src="this.character.avatar" alt="avatar" class="character-picture">
                <div class="identity">
                    <p :style="{color: classColor}" class="username">{{ this.character.username }}</p>
                    <p>{{ this.character.server.region }}-{{ this.character.server.name }}</p>
                    <p>{{ this.character.guild }}</p>
                </div>
            </div>
            <Badge title="Achievements">
                <div class="achievements-content">
                    <img :src="'/images/achievement-icon.png'" alt="achievement icon">
                    <p>{{ this.character.achievement_points }}</p>
                </div>
            </Badge>
            <Badge title="Links">
                <div class="links">
                    <a :href="armoryURL">
                        <img :src="'/images/wow-icon.png'" alt="">
                    </a>
                    <a :href="raiderioURL">
                        <img :src="'/images/raiderio-icon.png'" alt="">
                    </a>
                    <a :href="warcraftlogsURL">
                        <img :src="'/images/warcraftlogs-icon.png'" alt="">
                    </a>
                </div>
            </Badge>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'characterBackgroundLink',
        'characterProp',
    ],
    data()
    {
        return {
            character: {
                region: '',
                server: '',
                username: '',
                faction: '',
                achievement_points: 0,
                guild: '',
                class: 'Paladin',
                avatar: 'https://render-eu.worldofwarcraft.com/character/uldaman/86/112763222-avatar.jpg',
            },
            characterUndefined: false
        }
    },
    mounted()
    {
        if (this.characterProp)
            this.character = JSON.parse(this.characterProp)
        else
            this.characterUndefined = true

        console.log(this.character);
    },
    computed: {
        classColor: function ()
        {
            let colors = {
                'Paladin': '#F58CBA',
                'Warrior': '#C79C6E',
                'Hunter': '#ABD473',
                'Rogue': '#FFF569',
                'Priest': '#FFFFFF',
                'Shaman': '#0070DE',
                'Mage': '#69CCF0',
                'Druid': '#FF7D0A',
                'Monk': '#00FF96',
                'Warlock': '#9482C9',
                'Death Knight': '#C41F3B',
                'Demon Hunter': '#A330C9',
            }

            return colors[this.character.class]
        },
        characterBackground: function ()
        {
            let classSlug = this.character.class.replace(/\s+/, '-').toLowerCase()
            return `/images/class_backgrounds/${classSlug}.jpg`
        },
        armoryURL: function ()
        {
            return `https://worldofwarcraft.com/en-gb/character/${this.character.server.name}/${this.character.username}`
        },
        warcraftlogsURL: function ()
        {
            return `https://www.warcraftlogs.com/character/${this.character.region}/${this.character.server.name}/${this.character.username}`
        },
        raiderioURL: function ()
        {
            return `https://raider.io/characters/${this.character.region}/${this.character.server.name}/${this.character.username}`
        }
    }
}
</script>
