elifePipeline {
    node('containers-jenkins-plugin') {
        def commit
        stage 'Checkout', {
            checkout scm
            commit = elifeGitRevision()
        }

        def image
        stage 'Build image', {
            sh "IMAGE_TAG=${commit} docker-compose -f docker-compose.yml -f docker-compose.ci.yml build"
            image = DockerImage.elifesciences(this, 'proofreader-php', commit)
        }

        stage 'Smoke tests', {
            // runs proofreader on itself
            sh "docker run elifesciences/proofreader-php_ci:${commit}"
        }

        stage 'Push image', {
            elifeMainlineOnly {
                    image.push()
                    image.tag('latest').push()
            }

            elifeTagOnly { tag ->
                image.tag(tag).push()
            }
        }
    }
}
