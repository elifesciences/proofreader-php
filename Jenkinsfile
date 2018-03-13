elifeLibrary {
    def commit
    stage 'Checkout', {
        checkout scm
        commit = elifeGitRevision()
    }

    def image
    stage 'Build image', {
        dockerBuild 'proofreader-php', commit
        image = DockerImage.elifesciences(this, 'proofreader-php', commit)
    }

    stage 'Smoke tests', {
        // runs proofreader on itself
        sh "docker run elifesciences/proofreader-php:${commit} bin/proofreader sample/"
    }

    elifeMainlineOnly {
        stage 'Push image', {
            image.push()
            image.tag('latest').push()
        }
    }
}
