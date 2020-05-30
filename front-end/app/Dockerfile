# pull official base image
FROM node:13.12.0-alpine

# set working directory
# WORKDIR ./

# add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

# install app dependencies
COPY package.json ./package.json
COPY package-lock.json ./package-lock.json

RUN npm install --silent
RUN npm install react-scripts@latest -g --silent

# add app
COPY . ./

# exposes the port used by react
EXPOSE 3000


CMD tail -f /dev/null
